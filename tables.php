
<?php
// NOTE:, the following code was inspired by and adapted from Tutorial 7 "PHP/ORACLE"
// https://canvas.ubc.ca/courses/112179/assignments/1445437?module_item_id=5255267
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
        <title>Companalytics</title>
        <link rel="icon" type="image/x-icon" href="artifacts/104663.png">
    </head>
    
    <body>

        <!-- Import the navbar and the hidden HTML forms-->
        <?php include('forms.php');?>
     
        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            //testing commit from cwl account 2
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                //echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                //echo htmlentities($e['message']);
                $errorCode = strtok(htmlentities($e['message']), ':');
                handleError($errorCode);
                $success = False;
            }

			return $statement;
		}

        function handleError($errorCode) {
            switch($errorCode) {
                case 'ORA-01722';
                    echo "<div class=\"alertRed\">
                            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                            Ensure numbers are entered for numerical fields and text is entered for text fields.
                        </div>";
                    break;
                case 'ORA-00911':
                    echo "<div class=\"alertRed\">
                            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                            Enter the specified data.
                        </div>";
                    break;
                default:
                    break;
            }
        }

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example,
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_bengs", "a24158784", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }      

        function handleCompaniesRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT companyName FROM Company");
            printAllData($result);
        }

        function handleInvestorsRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT investorName FROM Investor");
            printAllData($result);
        }

        function handleIndustriesRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT industryName FROM Industry");
            printAllData($result);
        }

        function printAllData($result) {
            echo "<table id=\"allDataTable\" class=\"infoTable\">";
            $headers = "<tr>";
            $numAttributes = oci_num_fields($result);
            for ($i = 1; $i <= $numAttributes; $i++) {
                $headers .= "<th>" . oci_field_name($result, $i) . "</th>";
            }
            $headers .= "</tr>";
            echo $headers;
            
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                $rows = "<tr>";
                for ($i = 0; $i < $numAttributes; $i++) {
                    if ($row[$i] == 0 || $row[$i] == 1) {
                        $rows .= "<td>" . ($row[$i] == 1 ? 'True' : 'False') . "</td>";
                    } else {
                        $rows .= "<td>" . $row[$i] . "</td>";
                    }
                }
                $rows .= "</tr>";
                echo $rows;
            }

            echo "</table>";
        }

        // HANDLE ALL POST ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('showIndustriesTable', $_POST)) {
                    handleIndustriesRequest();
                } else if (array_key_exists('showInvestorsTable', $_POST)) {
                    handleInvestorsRequest();
                } else if (array_key_exists('showCompaniesTable', $_POST)) {
                    handleCompaniesRequest();
                }
                disconnectFromDB();
            } else {
                echo 'alert("failed to connect to DB")';
            }
        }

        function sanitizeInput($input){
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        //Note that this code is not inside a function - when the page is loaded by a form this is run!
        // FILE STARTS HERE
        // use submit button names here for search forms, and hidden value names here for navbar links
		if (isset($_POST['showIndustriesTable']) || isset($_POST['showInvestorsTable']) || isset($_POST['showCompaniesTable'])) {
            handlePOSTRequest();
        }
		?>
	</body>
</html>
