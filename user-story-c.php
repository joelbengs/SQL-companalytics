<html>
    <head>
        <title>Companalytics</title>
    </head>
    <style>
        .namesTable {
            margin: 5px;
            width: 15%;
            border-collapse: collapse;
            display: inline-table;
        }
        .infoTable {
            margin: 5px;
            width: 40%;
            border-collapse: collapse;
            display: inline-table;
        }
        th {
            padding: 15px; 
            text-align: center; 
            background-color: #1e1e1e; 
            color: white;
            font-weight: normal;
        }
        td {
            text-align: center; 
            border-bottom: 1px solid #ddd; 
            padding: 15px;
        }
        tr:hover {
            background-color: #EC7300;
        }
        .topnav-centered {
            float: none; 
            position: absolute; 
            top: 3%; 
            left:50%; 
            transform: translate(-50%, -50%);
        }
        .topnav {
            background-color: #1e1e1e; 
            overflow: hidden;
        }
        img {
            position: relative; top: 0px; left: 0; transform: none;
        }
        a {
            float: left; color: #f2f2f2; text-align: center; padding: 14px 16px; text-decoration: none; font-size: 17px;
        }
        .topnav-right {
            float: right;
        }
        #all-content {
            margin-left: 8px; 
            margin-right: 8px;
        }
    </style>

    <body style = "margin: 0px;">

        <div id="company-navigation-bar" class="topnav">

            <div class="topnav-centered">
                <a href = "https://www.students.cs.ubc.ca/~CWL/oracle-test.php"><img src="companalytics.png" alt="Companalytics"></a>
            </div>

            <form method="POST" id="showIndustries" action="oracle-test.php" style="display: none;">
                <input type="hidden" id="showIndustriesTable" value="showIndustriesTable" name="showIndustriesTable">
                <p><input type="submit" value="industry" name="showIndustry"></p>
            </form>

            <?= '<a href="#" onclick="document.getElementById(\'showIndustries\').submit(); ">Industries</a>'; ?>

            <?= '<a>Investors</a>'; ?>
            <?= '<a>Companies</a>'; ?>

            <div class="topnav-right">
                <?= '<a>Contact Us</a>'; ?>
                <?= '<a>About</a>'; ?>
            </div>
            
        </div>

        <div id = "all-content">

            <h2>Search Industries</h2>
            <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
                <input type="hidden" id="searchIndustries" name="searchIndustries">
                Industry Name: <input type="text" name="industryName"> <br /><br />
                <input type="submit" value="Search" name="searchIndustriesSubmit"></p>
            </form>

            <hr />

        </div>
     
        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())
        $industriesExists = False;

        function debugAlertMessage($message) {
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
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
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
            $db_conn = OCILogon("ora_platypus", "a12345678", "dbhost.students.cs.ubc.ca:1522/stu");

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

        // function handleInsertRequest() {
        //     global $db_conn;

        //     //Getting the values from user and insert data into the table
        //     $tuple = array (
        //         ":bind1" => $_POST['insNo'],
        //         ":bind2" => $_POST['insName']
        //     );

        //     $alltuples = array (
        //         $tuple
        //     );

        //     executeBoundSQL("insert into demoTable values (:bind1, :bind2)", $alltuples);
        //     OCICommit($db_conn);
        // }

        
        // when the user clicks the industries button from the navigation bar (sets up the industries table if it does not already exist, displays industry names after)
        function handleIndustriesRequest() {
            global $db_conn, $industriesExists;

            $checkExists = executePlainSQL("SELECT table_name FROM user_tables where table_name = 'INDUSTRY'");

            if (($row = oci_fetch_row($checkExists)) != false) {
                if ($row[0] == '') {
                    $industriesExists = False;
                } else if ($row[0] == 'INDUSTRY') {
                    $industriesExists = True;
                }
            }

            if ($industriesExists == False) {
                executePlainSQL("CREATE TABLE Industry (industryName char(80) PRIMARY KEY, growthRate NUMERIC(7, 2), averagePERatio int, averageRevenue int)");
                executePlainSQL("INSERT INTO Industry(industryName, growthRate, averagePERatio, averageRevenue) VALUES('Mining', 0.05, 17, 20000)");
                executePlainSQL("INSERT INTO Industry(industryName, growthRate, averagePERatio, averageRevenue) VALUES('Health', 0.1, 25, 15000)");
                executePlainSQL("INSERT INTO Industry(industryName, growthRate, averagePERatio, averageRevenue) VALUES('Defense', 0.02, 13, 8000)");
                executePlainSQL("INSERT INTO Industry(industryName, growthRate, averagePERatio, averageRevenue) VALUES('Technology', 0.15, 23, 12000)");
                executePlainSQL("INSERT INTO Industry(industryName, growthRate, averagePERatio, averageRevenue) VALUES('Real Estate', 0.03, 10, 9000)");
                executePlainSQL("INSERT INTO Industry(industryName, growthRate, averagePERatio, averageRevenue) VALUES('Automobiles', 0.03, 13, 20000)");
                OCICommit($db_conn);
            }

            $result = executePlainSQL("SELECT industryName FROM Industry");
            printNames($result, 'industryName');
        }

        // when the user clicks search on industries, displays all info relevant to that industry
        function handleSearchIndustries() {
            global $db_conn;

            $industryName = $_POST['industryName'];
            if ($industryName == '') {
                $result = executePlainSQL("SELECT * FROM Industry");
            } else {
                $result = executePlainSQL("SELECT * FROM Industry WHERE LOWER(industryName) = '" . strtolower($industryName) . "'");
            }
            printIndustryInformation($result);
        }

        // helper used to create the table for primary key of a table (can be used universally)
        function printNames($result, $primary_key) {
            echo "<table id=\"namesTable\" class=\"namesTable\">";
            echo "<tr><th>" . $primary_key . "</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        // helper used to print all info of a table
        function printIndustryInformation($result) { //prints results from a select statement
            echo "<table id=\"industryInfoTable\" class=\"infoTable\">";
            echo "<tr><th>industryName</th><th>growthRate</th><th>averagePERatio</th><th>averageRevenue</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["INDUSTRYNAME"] . "</td><td>" . $row["GROWTHRATE"] . "</td><td>" . $row["AVERAGEPERATIO"] . 
                "</td><td>" . $row["AVERAGEREVENUE"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
           // echo "<button id = \"industryInfoRemove\" onclick=\"removeIndustryInfo()\">Remove</button>";
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('showIndustriesTable', $_POST)) {
                    handleIndustriesRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('searchIndustries', $_POST)) {
                    handleSearchIndustries();
                    //handleInsertRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                }

                disconnectFromDB();
            }
        }

        // use submit button names here for search forms, and hidden value names here for navbar links
		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['showIndustriesTable']) || isset($_POST['searchIndustriesSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
	</body>
</html>
