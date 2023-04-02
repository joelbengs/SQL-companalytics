<html>
    <head>
        <title>Companalytics</title>
        <link rel="icon" type="image/x-icon" href="./104663.png">
    </head>
    <style>
        .displayForm {
            display: inline-block;
            margin: 0 10px 0px 10px;
        }
        .displayDiv {
            display: inline-block;
            margin-top: 5px;
            padding: 5px;
            border-style: solid;
        }
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
        .searchButton {
            background-color: #1e1e1e; 
            border: none;
            border-radius: 11px;
            color: white;
            padding: 7px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }
        .searchBox {
            border-radius: 12px;
            border-width: thin;
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
            top: 19px;
            left: 50%; 
            transform: translate(-50%, -50%);
        }
        .topnav {
            background-color: #1e1e1e; 
            overflow: hidden;
        }
        img {
            position: absolute; top: 0px; left: 0; height:40px; transform: none;
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

            <!--Company logo. Currently, pressing it leads to illegal URL-->
            <div class="topnav-centered">
                <a href = "https://www.students.cs.ubc.ca/~CWL/oracle-test.php"><img src="companalytics.png" alt="Companalytics"></a>
            </div>

            <!--This form is hidden from view, but submitted as HTTP POST when link below is pressed.-->
            <!--The form is prefilled with values.-->
            <!--When this form is submitted, the file under action will be called with the array $_POST containing the string "showIndustriesTable"-->
            <!--INDUSTRIES-->
            <form method="POST" id="showIndustries" action="oracle-test.php" style="display: none;">
                <input type="hidden" id="showIndustriesTable" value="showIndustriesTable" name="showIndustriesTable">
                <p><input type="submit" value="industry" name="showIndustry"></p>
            </form>

            <!--This is the clickable text that the user can see and press to submit the above hidden form-->
            <?= '<a href="#" onclick="document.getElementById(\'showIndustries\').submit(); ">Industries</a>'; ?>

            <!--INVESTOR-->
            <form method="POST" id="showInvestors" action="oracle-test.php" style="display: none;">
                <input type="hidden" id="showInvestorsTable" value="showInvestorsTable" name = "showInvestorsTable">
                <input type="submit" value="investor" name="showInvestor">
            </form>

            <?= '<a href="#" onclick="document.getElementById(\'showInvestors\').submit();">Investors</a>'; ?>

            <!--COMPANIES-->
            <form method="POST" id="showCompanies" action="oracle-test.php" style="display: none;">
                <input type="hidden" id="showCompaniesTable" value="showCompaniesTable" name="showCompaniesTable">
                <p><input type="submit" value="company" name="showCompany"></p>
            </form>

            <?= '<a href="#" onclick="document.getElementById(\'showCompanies\').submit(); ">Companies</a>'; ?>

            <div class="topnav-right">
                <?= '<a>Contact Us</a>'; ?>
                <?= '<a>About</a>'; ?>
            </div>
            
        </div>

        <div id = "all-content">

            <div class = "displayDiv">
                <h2>Search Industries</h2>
                <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                    Industry Name: <input type="text" name="industryName" class="searchBox">
                    PE Ratio: <input type="text" name="peRatio" class="searchBox">
                    Revenue: <input type="text" name="revenue" class="searchBox">
                    <input type="submit" value="Search" name="searchIndustriesSubmit" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->

            <div class = "displayDiv">
                <h2>Search Investors</h2>
                <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorName" class="searchBox">
                    <input type="submit" value="Search" name="searchInvestorsSubmit" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->

            <div class = "displayDiv">
                <h2>Search Companies</h2>
                <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                    Company Name: <input type="text" name="companyName" class="searchBox">
                    <input type="submit" value="Search" name="searchCompaniesSubmit" class="button searchButton"></p>
                </form>
            </div>

            <br><br>

            <div class = "displayDiv">
                <h2>Find Above Average Industries Per Investor</h2>
                <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorAboveAverage" class="searchBox">
                    <input type="submit" value="Search" name="searchAboveAverage" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->
            <div class = "displayDiv">
                <h2>Find Industrial Commitment Per Investor</h2>
                <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorCommit" class="searchBox">
                    <input type="submit" value="Search" name="searchIndustrialCommit" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->
            <div class = "displayDiv">
                <h2>View Total Amount Invested Per Industry</h2>
                <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorNameTotal" class="searchBox">
                    <input type="submit" value="Search" name="searchTotalInvest" class="button searchButton"></p>
                </form>
            </div>

            <hr />

            <h2>Search For The Youngest CEOs Per Degree</h2>
            <form method="POST" action="oracle-test.php" class = "displayForm"> <!--refresh page when submitted-->
                Gender: <select name="ceoGender" id="genderSelect">
                            <option value=""></option>
                            <option value="MAN">Man</option>
                            <option value="WOMAN">Woman</option>
                        </select>
                <input type="submit" value="Search" name="searchCEOs" class="button searchButton"></p>
            </form>

            <hr />

            

        </div>
     
        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())
        $industriesExists = False;
        $companiesExist = False;
        $investsExists = False;
        $activeInExists = False;
        $ceoExists = False;
        $investorExist = False;

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

        /* function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insNo'],
                ":bind2" => $_POST['insName']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into demoTable values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }  */
        
        function handleCompaniesRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT companyName FROM Company");
            printNames($result, 'Company');
        }

        function handleInvestorsRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT investorName FROM Investor");
            printNames($result, 'Investor');
        }

        // when the user clicks the industries button from the navigation bar (sets up the industries table if it does not already exist, displays industry names after)
        function handleIndustriesRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT industryName FROM Industry");
            printNames($result, 'Industry');
        }

        // when the user clicks search on industries, displays all info relevant to that industry
        function handleSearchIndustries() {
            global $db_conn;

            $industryName = $_POST['industryName'];
            $peRatio = $_POST['peRatio'];
            $revenue = $_POST['revenue'];
            $sql = "SELECT * FROM Industry";

            if ($industryName != '') {
                $sql .= " WHERE LOWER(industryName) = '" . strtolower($industryName) . "'";
            } 
            if ($peRatio != '') {
                if (strpos($sql, 'WHERE') !== false) {
                    $sql .= " AND AVERAGEPERATIO = " . $peRatio . "";
                } else {
                    $sql .= " WHERE AVERAGEPERATIO = " . $peRatio . "";
                }
            }

            if ($revenue != '') {
                if (strpos($sql, 'WHERE') !== false) {
                    $sql .= " AND AVERAGEREVENUE = " . $revenue . "";
                } else {
                    $sql .= " WHERE AVERAGEREVENUE = " . $revenue . "";
                }
            }
            $result = executePlainSQL($sql);
            printIndustryInformation($result);
        }

        // when the user clicks search on industries, displays all info relevant to that industry
        function handleSearchInvestors() {
            global $db_conn;

            $investorName = $_POST['investorName'];
            if ($investorName == '') {
                $resultA = executePlainSQL("SELECT * FROM Investor");
                printInvestorInformation($resultA);
            } else {
                $resultA = executePlainSQL("SELECT * FROM Investor WHERE LOWER(investorName) = '" . strtolower($investorName) . "'");
                $resultB = executePlainSQL("SELECT I.companyName, I.amountInvested, C.country, A.industryName FROM Invests I, Company C, ActiveIn A WHERE I.companyName = C.companyName AND C.companyName = A.companyName AND LOWER(investorName) = '" . strtolower($investorName) . "'");
                printInvestorInformation($resultA);
                printInvestments($resultB);
            }
        }

        // when the user clicks search on industries, displays all info relevant to that industry
        function handleSearchCompanies() {
            global $db_conn;

            $companyName = $_POST['companyName'];

            if ($companyName == '') {
                $result = executePlainSQL("SELECT * FROM Company");
            } else {
                $result = executePlainSQL("SELECT * FROM Company WHERE LOWER(companyName) = '" . strtolower($companyName) . "'");
            }
            printCompanyInformation($result);
        }

        function handleSearchAboveAverage() {
            global $db_conn;

            $investorName = $_POST['investorAboveAverage'];
            $result = executePlainSQL("SELECT '". ucwords($investorName) . "' invName, Temp.industryName indName, ROUND(Temp.growthRate, 3) avgGR 
                                        FROM ( SELECT A.industryName, AVG(C.growthRate) as growthRate
                                            FROM Invests Inv, Company C, ActiveIn A
                                            WHERE C.companyName = Inv.companyName AND A.companyName = C.companyName 
                                            AND LOWER(Inv.investorName) = '". strtolower($investorName) . "' 
                                            GROUP BY A.industryName ) Temp 
                                        WHERE Temp.growthRate > (SELECT AVG(growthRate) FROM Company)");
            printAboveAverageInformation($result);
        }

        function handleSearchCEOs() {
            global $db_conn;
            
            $gender = $_POST['ceoGender'];
            $result = executePlainSQL("SELECT min(age) age, educationLevel
                                    FROM CEO
                                    WHERE gender = '" . $gender . "'
                                    GROUP BY educationLevel
                                    HAVING count(*) > 1");
            printCEOInfo($result);
        }

        function handleTotalInvest() {
            global $db_conn;

            $investorName = $_POST['investorNameTotal'];
            $result = executePlainSQL("SELECT sum(amountInvested) amount, industryName
                                       FROM Invests I, ActiveIn AI
                                       WHERE LOWER(investorName) = '" . strtolower($investorName) . "'
                                       AND AI.companyName = I.companyName
                                       GROUP BY AI.industryName");
            printTotalInvestInfo($result);
        }

        function handleIndustrialCommit() {
            global $db_conn;
            $investorName = $_POST['investorCommit'];
            $result = executePlainSQL("SELECT I.industryName 
                                        FROM Industry I 
                                        WHERE NOT EXISTS (SELECT companyName 
                                                        FROM ActiveIn A
                                                        WHERE A.industryName = I.industryName
                                                        AND NOT EXISTS ( 
                                                        SELECT companyName 
                                                        FROM Invests 
                                                        WHERE LOWER(investorName) = '" . strtolower($investorName) . "'
                                                        AND companyName = A.companyName))");
            printNames($result, 'Industry');
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
            echo "<tr><th>Industry Name</th><th>Average PE Ratio</th><th>Average Revenue</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["INDUSTRYNAME"] . "</td><td>" . $row["AVERAGEPERATIO"] . 
                "</td><td>" . $row["AVERAGEREVENUE"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }
        
        // helper used to print all info of a table
        function printInvestorInformation($result) {
            echo "<table id=\"investorInfoTable\" class=\"infoTable\">";
            echo "<tr><th>Investor Name</th><th>Venture Capitalist?</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr>
                        <td>" . $row["INVESTORNAME"] . "</td>
                        <td>" . ($row["ISVENTURECAPITALIST"] ? 'Yes' : 'No') . "</td>
                    </tr>";
            }

            echo "</table>";
        }

        function printInvestments($result) {
            echo "<table id=\"investmentsInfoTable\" class=\"infoTable\">";
                echo "<tr>
                        <th>Investment</th>
                        <th>Amount Invested</th>
                        <th>Industry</th>
                        <th>Country</th>
                    </tr>";
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                            <td>" . $row["COMPANYNAME"] . "</td>
                            <td>" . $row["AMOUNTINVESTED"] . "</td>
                            <td>" . $row["INDUSTRYNAME"] . "</td>
                            <td>" . $row["COUNTRY"] . "</td>
                        </tr>";  
                }
            echo "</table>";
        }

        // helper used to print all info of a table
        function printCompanyInformation($result) { //prints results from a select statement
            echo "<table id=\"companyInfoTable\" class=\"infoTable\">";
            echo "<tr><th>Company Name</th><th>Product</th><th>Ticker</th><th>Country</th><th>Growth Rate</th><th>CEO</th><th>CEO Start Date</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["COMPANYNAME"] . "</td><td>" . $row["PRODUCT"] . "</td><td>" . $row["TICKER"] . 
                "</td><td>" . $row["COUNTRY"] . "</td><td>" . $row["GROWTHRATE"] . "</td><td>" . $row["CEO"] . "</td><td>" . $row["CEODATESTARTED"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        // helper used to print all info of a table
        function printAboveAverageInformation($result) { //prints results from a select statement
            echo "<table id=\"aboveAverageInfo\" class=\"infoTable\">";
            echo "<tr><th>Investor Name</th><th>Industry Name</th><th>Growth Rate</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["INVNAME"] . "</td><td>" . $row["INDNAME"] . "</td><td>" . $row["AVGGR"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        // helper used to print all info of a table
        function printCEOInfo($result) { //prints results from a select statement
            echo "<table id=\"CEOInfo\" class=\"infoTable\">";
            echo "<tr><th>Age</th><th>Education Level</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["AGE"] . "</td><td>" . $row["EDUCATIONLEVEL"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

          // helper used to print all info of a table
          function printTotalInvestInfo($result) { //prints results from a select statement
            echo "<table id=\"TotalInvestInfo\" class=\"infoTable\">";
            echo "<tr><th>Industry Name</th><th>Amount</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["INDUSTRYNAME"] . "</td><td>" . $row["AMOUNT"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        // HANDLE ALL POST ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('showIndustriesTable', $_POST)) {
                    handleIndustriesRequest();
                } else if (array_key_exists('showInvestorsTable', $_POST)) {
                    handleInvestorsRequest();
                } else if (array_key_exists('showCompaniesTable', $_POST)) {
                    handleCompaniesRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if ($_POST['searchIndustriesSubmit'] == 'Search') {
                    handleSearchIndustries();
                } else if ($_POST['searchCompaniesSubmit'] == 'Search') {
                    handleSearchCompanies();
                } else if ($_POST['searchInvestorsSubmit'] == 'Search'){
                    handleSearchInvestors();
                } else if ($_POST['searchAboveAverage'] == 'Search') {
                    handleSearchAboveAverage();
                } else if ($_POST['searchCEOs'] == 'Search') {
                    handleSearchCEOs();
                } else if ($_POST['searchTotalInvest'] == 'Search') {
                    handleTotalInvest();
                } else if ($_POST['searchIndustrialCommit'] == 'Search') {
                    handleIndustrialCommit();
                }

                disconnectFromDB();
            } else {
                echo 'alert("failed to connect to DB")';
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
            } else {
                echo 'alert("failed to connect to DB")';
            }
        }
        
        //Note that this code is not inside a function - when the page is loaded by a form this is run!
        // FILE STARTS HERE
        // use submit button names here for search forms, and hidden value names here for navbar links
		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['showIndustriesTable']) || 
            isset($_POST['showInvestorsTable']) || isset($_POST['showCompaniesTable']) || isset($_POST['searchIndustriesSubmit']) || 
            isset($_POST['searchCompaniesSubmit']) || isset($_POST['searchInvestorsSubmit']) || isset($_POST['searchAboveAverage']) || isset($_POST['searchCEOs']) || 
            isset($_POST['searchTotalInvest']) || isset($_POST['searchIndustrialCommit'])) {
            handlePOSTRequest();

        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
	</body>
</html>
