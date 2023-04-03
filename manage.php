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

            <!--MANAGE-->
            <form method="POST" id="managePage" action="manage.php" style="display: none;">
                <input type="hidden" id="goToManage" value="manage" name="goToManage">
                <p><input type="submit" value="manage" name="manage"></p>
            </form>

            <?= '<a href="#" onclick="document.getElementById(\'managePage\').submit(); ">Manage</a>'; ?>

            <div class="topnav-right">
                <?= '<a>Contact Us</a>'; ?>
                <?= '<a>About</a>'; ?>
            </div>
            
        </div>

        <div id = "all-content">

            <h2>Add Data</h2>
            <form method="POST" action="manage.php">
                Table: <select name="addTableData" id="addTableSelector">
                                <option value=""></option>
                                <option value="Company">Company</option>
                                <option value="Industry">Industry</option>
                                <option value="Investor">Investor</option>
                                <option value="CEO">CEO</option>
                                <option value="ActiveIn">ActiveIn</option>
                                <option value="InvestedIn">InvestedIn</option>
                                <option value="ListedOn">ListedOn</option>
                        </select>
                <input type="submit" value="Select" name="addDataToTables" class="button searchButton"></p>
            </form>
            <hr />

            <h2>Update Data</h2>
            <form method="POST" action="manage.php">
                Table: <select name="updateTableData" id="updateTableSelector">
                                <option value=""></option>
                                <option value="Company">Company</option>
                                <option value="Industry">Industry</option>
                                <option value="Investor">Investor</option>
                                <option value="CEO">CEO</option>
                                <option value="ActiveIn">ActiveIn</option>
                                <option value="InvestedIn">InvestedIn</option>
                                <option value="ListedOn">ListedOn</option>
                        </select>
                <input type="submit" value="Select" name="updateDataInTables" class="button searchButton"></p>
            </form>
            <hr />

            <h2>Delete Data</h2>
            <form method="POST" action="manage.php">
                Table: <select name="deleteTableData" id="deleteTableSelector">
                    <option value=""></option>
                    <option value="Company">Company</option>
                    <option value="Industry">Industry</option>
                    <option value="Investor">Investor</option>
                    <option value="CEO">CEO</option>
                    <option value="ActiveIn">ActiveIn</option>
                    <option value="InvestedIn">InvestedIn</option>
                    <option value="ListedOn">ListedOn</option>
                </select>
                <input type="submit" value="Select" name="deleteDataInTables" class="button searchButton"></p>
            </form>
            <hr />

            <h2>View Data</h2>
            <form method="POST" action="manage.php">
                Table: <select name="viewTableData" id="viewTableSelector">
                                <option value=""></option>
                                <option value="Company">Company</option>
                                <option value="Industry">Industry</option>
                                <option value="Investor">Investor</option>
                                <option value="CEO">CEO</option>
                                <option value="ActiveIn">ActiveIn</option>
                                <option value="Invests">Invests</option>
                                <option value="Country">Country</option>
                                <option value="Language">Language</option>
                                <option value="Education">Education</option>
                                <option value="Culture">Culture</option>
                                <option value="lvStoUa">lvStoUa</option>
                                <option value="mvfToIvcPd">mvfToIvcPd</option>
                                <option value="Founder">Founder</option>
                                <option value="Liabilities">Liabilities</option>
                                <option value="Finances">Finances</option>
                                <option value="Earnings">Earnings</option>
                                <option value="Revenue">Revenue</option>
                                <option value="Firms">Firms</option>
                                <option value="StockExchange">StockExchange</option>
                                <option value="AcquiredCompany">AcquiredCompany</option>
                                <option value="StockInfo">StockInfo</option>
                                <option value="ListedOn">ListedOn</option>
                        </select>
                <input type="submit" value="Select" name="viewDataInTables" class="button searchButton"></p>
            </form>

            <?php
            // gets the attributes for each table and adds to array to later use in the form checkbox
            if ($_POST['viewTableData'] != '') {
                $attributeOptions = [];
                $tableName = $_POST['viewTableData'];
                if (connectToDB()) {
                    $result = executePlainSQL("SELECT * FROM $tableName");
                    $numAttributes = oci_num_fields($result);
                    for ($i = 1; $i <= $numAttributes; $i++) {
                        array_push($attributeOptions, oci_field_name($result, $i));
                    }
            ?>

            <form method="POST" action="manage.php">
                <?php
                    // loops through each attribute and creates a dynamic checkbox with attribute name
                    foreach ($attributeOptions as $attr) {
                        echo $attr . "<input type=\"checkbox\" name=\"selectedAttributes[]\" value=\"" . $attr . "\">";
                    } 
                echo "<input type=\"hidden\" name=\"tableName\" value=\"" . $tableName . "\">"; ?>
                <input type="submit" value="Select" name="selectedAttributesSubmit" class="button searchButton"></p>
            </form>

            <?php
                    } // ends if statement for connecting to DB
                }   // ends overall if statement for showing attribute options
            ?>

            <hr />

            <?php 
                if ($_POST['addTableData'] == 'Company') {
            ?>

            <h2>Add Company</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="addCompany" name="addCompany">
                Name: <input type="text" name="addCompanyName" class="searchBox" required>
                Product: <input type="text" name="addCompanyProduct" class="searchBox">
                Ticker: <input type="text" name="addCompanyTicker" class="searchBox" required>
                Country: <input type="text" name="addCompanyCountry" class="searchBox" required>
                CEO: <input type="text" name="addCompanyCEO" class="searchBox" required>
                Start Date: <input type="text" name="addCompanyDate" class="searchBox">
                Growth Rate: <input type="text" name="addCompanyGrowth" class="searchBox">
                <input type="submit" value="Add" name="addCompanySubmit" class="button searchButton"></p>
            </form>

            <hr />

            <?php 
                };
                if ($_POST['addTableData'] == 'Industry') {
            ?>
            <h2>Add Industry</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="addIndustry" name="addIndustry">
                Name: <input type="text" name="addIndustryName" class="searchBox" required>
                Average PE Ratio: <input type="text" name="addIndustryPE" class="searchBox">
                Average Revenue: <input type="text" name="addIndustryRevenue" class="searchBox">
                <input type="submit" value="Add" name="addIndustrySubmit" class="button searchButton"></p>
            </form>

            <hr />
            <?php 
                }
                if ($_POST['addTableData'] == 'Investor') {
            ?>

            <h2>Add Investor</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="addInvestor" name="addInvestor">
                Name: <input type="text" name="addInvestorName" class="searchBox" required>
                Venture Capitalist: <select name="addInvestorVC" id="addInvestorVC">
                    <option value=""></option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
                <input type="submit" value="Add" name="addInvestorSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['addTableData'] == 'CEO') {
            ?>

            <h2>Add CEO</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="addCEO" name="addCEO">
                Name: <input type="text" name="addCEOName" class="searchBox" required>
                Age: <input type="text" name="addCEOAge" class="searchBox">
                Gender: <select name="addCEOGender" id="addCEOGender">
                    <option value=""></option>
                    <option value="MAN">Man</option>
                    <option value="WOMAN">Woman</option>
                </select>
                Education Level: <input type="text" name="addCEOEducation" class="searchBox">
                <input type="submit" value="Add" name="addCEOSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['addTableData'] == 'ActiveIn') {
            ?>

            <h2>Set Company to be Active In an Industry</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="addActiveIn" name="addActiveIn">
                Company Name: <input type="text" name="addActiveInCompany" class="searchBox" required>
                Industry Name: <input type="text" name="addActiveInIndustry" class="searchBox" required>
                Active Since: <input type="text" name="addActiveInSince" class="searchBox">
                <input type="submit" value="Add" name="addActiveInSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['addTableData'] == 'InvestedIn') {
            ?>

            <h2>Set Investor to be Invested In a Company</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="addInvests" name="addInvests">
                Investor Name: <input type="text" name="addInvestsInvestor" class="searchBox" required>
                Company Name: <input type="text" name="addInvestsCompany" class="searchBox" required>
                Amount Invested: <input type="text" name="addInvestsAmount" class="searchBox">
                <input type="submit" value="Add" name="addInvestsSubmit" class="button searchButton"></p>
            </form>

                    <?php
                }
            if ($_POST['addTableData'] == 'ListedOn') {
                ?>

                <h2>Set Company to be Listed On a StockExchange</h2>
                <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                    <input type="hidden" id="addListedOn" name="addListedOn">
                    Exchange Name: <input type="text" name="addListedOnExchange" class="searchBox" required>
                    Company Name: <input type="text" name="addListedOnCompany" class="searchBox" required>
                    Date Listed: <input type="text" name="addListedOnDate" class="searchBox">
                    StockPrice: <input type="text" name="addListedOnPrice" class="searchBox">
                    <input type="submit" value="Add" name="addListedOnSubmit" class="button searchButton"></p>
                </form>

            <?php 
                }
                if ($_POST['updateTableData'] == 'Company') {
            ?>

            <h2>Update Company</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateCompany" name="updateCompany">
                Name: <input type="text" name="updateCompanyName" class="searchBox" required>
                Product: <input type="text" name="updateCompanyProduct" class="searchBox">
                Ticker: <input type="text" name="updateCompanyTicker" class="searchBox">
                CEO: <input type="text" name="updateCompanyCEO" class="searchBox">
                Start Date: <input type="text" name="updateCompanyDate" class="searchBox">
                Growth Rate: <input type="text" name="updateCompanyGrowth" class="searchBox">
                <input type="submit" value="Search" name="updateCompanySubmit" class="button searchButton"></p>
            </form>

            <hr />

            <?php 
                }
                if ($_POST['updateTableData'] == 'Industry') {
            ?>

            <h2>Update Industry</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateIndustry" name="updateIndustry">
                Name: <input type="text" name="updateIndustryName" class="searchBox" required>
                Average PE Ratio: <input type="text" name="updateIndustryPE" class="searchBox">
                Average Revenue: <input type="text" name="updateIndustryRevenue" class="searchBox">
                <input type="submit" value="Update" name="updateIndustrySubmit" class="button searchButton"></p>
            </form>
            <hr />

            <?php
                }
                if ($_POST['updateTableData'] == 'Investor') {
            ?>
            <h2>Update Investor</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateInvestor" name="updateInvestor">
                Name: <input type="text" name="updateInvestorName" class="searchBox" required>
                Venture Capitalist: <select name="updateInvestorVC" id="updateInvestorVC">
                    <option value=""></option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                </select>
                <input type="submit" value="Update" name="updateInvestorSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['deleteTableData'] == 'Company') {
            ?>
            <h2>Delete Company</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteCompany" name="deleteCompany">
                Name: <input type="text" name="deleteCompanyName" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteCompanySubmit" class="button searchButton"></p>
            </form>
            <?php
                }
                if ($_POST['deleteTableData'] == 'Industry') {
            ?>
            <h2>Delete Industry</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteIndustry" name="deleteIndustry">
                Name: <input type="text" name="deleteIndustryName" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteIndustrySubmit" class="button searchButton"></p>
            </form>
            <?php
                }
                if ($_POST['deleteTableData'] == 'Investor') {
            ?>
            <h2>Delete Investor</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteInvestor" name="deleteInvestor">
                Name: <input type="text" name="deleteInvestorName" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteInvestorSubmit" class="button searchButton"></p>
            </form>
            <?php
                }
            ?>

        </div>
     
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

        function handleMakeCompany() {
            global $db_conn;

            $company = $_POST['addCompanyName'];
            $companyProduct = $_POST['addCompanyProduct'];
            $companyTicker = $_POST['addCompanyTicker'];
            $companyCountry = $_POST['addCompanyCountry'];
            $companyCEO = $_POST['addCompanyCEO'];
            $companyCEOStartDate = $_POST['addCompanyDate'];
            $companyGrowthRate = $_POST['addCompanyGrowth'];

            $sqlInsert = "INSERT INTO Company(companyName, ticker, country, ceo";
            $sqlValues = " VALUES('$company', '$companyTicker', '$companyCountry', '$companyCEO'";

            if ($companyProduct) {
                $sqlInsert .= ", product";
                $sqlValues .= ", '$companyProduct'";
            }
            if ($companyCEOStartDate) {
                $sqlInsert .= ", ceoDateStarted";
                $sqlValues .= ", '$companyCEOStartDate'";
            }
            if ($companyGrowthRate) {
                $sqlInsert .= ", growthRate";
                $sqlValues .= ", $companyGrowthRate";
            }
            $sqlInsert .= ") ";
            $sqlValues .= ")";

            $insertString = $sqlInsert . $sqlValues;
            executePlainSQL($insertString);
            echo "Inserted Company";
            OCICommit($db_conn);
        }

        function handleMakeIndustry() {
            global $db_conn;

            $industry = $_POST['addIndustryName'];
            $industryPERatio = $_POST['addIndustryPE'];
            $industryRevenue = $_POST['addIndustryRevenue'];

            $sqlInsert = "INSERT INTO Industry(industryName";
            $sqlValues = " VALUES('$industry'";

            if ($industryPERatio) {
                $sqlInsert .= ", averagePERatio";
                $sqlValues .= ", $industryPERatio";
            }
            if ($industryRevenue) {
                $sqlInsert .= ", averageRevenue";
                $sqlValues .= ", $industryRevenue";
            }
            $sqlInsert .= ") ";
            $sqlValues .= ")";

            $insertString = $sqlInsert . $sqlValues;

            executePlainSQL($insertString);
            echo "Inserted Industry";
            OCICommit($db_conn);
        }

        function handleMakeInvestor() {
            global $db_conn;

            $investor = $_POST['addInvestorName'];
            $isVC = $_POST['addInvestorVC'];
            if ($isVC == "True") {
                $investorVC = 1;
            } else {
                $investorVC = 0;
            }


            $insertString = "INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('$investor', $investorVC)";

            executePlainSQL($insertString);
            echo "Inserted Investor";
            OCICommit($db_conn);
        }

        function handleMakeCEO() {
            global $db_conn;

            $ceo = $_POST['addCEOName'];
            $ceoAge = $_POST['addCEOAge'];
            $ceoGender = $_POST['addCEOGender'];
            $ceoEducation = $_POST['addCEOEducation'];


            $insertString = "INSERT INTO CEO(ceoName, age, gender, educationLevel) VALUES('$ceo', $ceoAge, '$ceoGender', '$ceoEducation')";
            executePlainSQL($insertString);
            echo "Inserted CEO";
            OCICommit($db_conn);
        }

        function handleMakeActiveIn() {
            global $db_conn;

            $company = $_POST['addActiveInCompany'];
            $industry = $_POST['addActiveInIndustry'];
            $activeSince = $_POST['addActiveInSince'];

            $insertString = "INSERT INTO ActiveIn(companyName, industryName, activeSince) VALUES('$company', '$industry', '$activeSince')";
            executePlainSQL($insertString);
            echo "Linked Company to Industry";
            OCICommit($db_conn);
        }

        function handleMakeInvests() {
            global $db_conn;

            $investor = $_POST['addInvestsInvestor'];
            $company = $_POST['addInvestsCompany'];
            $amountInvested = $_POST['addInvestsAmount'];

            $insertString = "INSERT INTO Invests(investorName, companyName, amountInvested) VALUES('$investor', '$company', $amountInvested)";
            executePlainSQL($insertString);
            echo "Linked Investor to Company";
            OCICommit($db_conn);
        }

        function handleMakeListedOn() {
            global $db_conn;

            $exchangeName = $_POST['addListedOnExchange'];
            $company = $_POST['addListedOnCompany'];
            $dateListed = $_POST['addListedOnDate'];
            $stockPrice = $_POST['addListedOnPrice'];

            $insertString = "INSERT INTO ListedOn(exchangeName, companyName, dateListed, stockPrice) VALUES('$exchangeName', '$company', '$dateListed', $stockPrice)";
            executePlainSQL($insertString);
            echo "Listed Company on Stock Exchange";
            OCICommit($db_conn);
        }

        function handleUpdateIndustry() {
            global $db_conn;

            $industry = strtolower($_POST['updateIndustryName']);
            $industryPERatio = $_POST['updateIndustryPE'];
            $industryRevenue = $_POST['updateIndustryRevenue'];

            $updateSet = "UPDATE Industry SET industryName = '" . ucwords($industry) . "', ";
            if ($industryPERatio) {
                $updateSet .= "averagePERatio = $industryPERatio, ";
            }
            if ($industryRevenue) {
                $updateSet .= "averageRevenue = $industryRevenue, ";
            }
            $updateSet = rtrim($updateSet, ", ");
            $updateSet .= " WHERE LOWER(industryName) = '$industry'";

            executePlainSQL($updateSet);
            echo "Updated Industry";
            OCICommit($db_conn);
        }

        function handleUpdateCompany() {
            global $db_conn;

            $company = strtolower($_POST['updateCompanyName']);
            $companyProduct = $_POST['updateCompanyProduct'];
            $companyTicker = $_POST['updateCompanyTicker'];
            $companyCEO = $_POST['updateCompanyCEO'];
            $companyCEOStartDate = $_POST['updateCompanyDate'];
            $companyGrowthRate = $_POST['updateCompanyGrowth'];

            $updateString = "UPDATE Company SET companyName = '" . ucwords($company) . "', ";
            if ($companyProduct) {
                $updateString .= "product = '$companyProduct', ";
            }
            if ($companyTicker) {
                $updateString .= "ticker = '$companyTicker', ";
            }
            if ($companyCEO) {
                $updateString .= "ceo = '$companyCEO', ";
            }
            if ($companyCEOStartDate) {
                $updateString .= "ceoDateStarted = '$companyCEOStartDate', ";
            }
            if ($companyGrowthRate) {
                $updateString .= "growthRate = '$companyGrowthRate', ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(companyName) = '$company'";

            // TODO: need to check if company exists or not, and to make foreign keys in table
            executePlainSQL($updateString);
            echo "Updated Company";
            OCICommit($db_conn);
        }

        function handleUpdateInvestor() {
            global $db_conn;

            $investor = strtolower($_POST['updateInvestorName']);
            $isVC = $_POST['updateInvestorVC'];
            if ($isVC == "True") {
                $investorVC = 1;
            } else {
                $investorVC = 0;
            }

            $updateString = "UPDATE Investor SET isVentureCapitalist = $investorVC WHERE LOWER(investorName) = '$investor'";
            executePlainSQL($updateString);
            echo "Updated Investor";
            OCICommit($db_conn);
        }

        function handleDeleteCompany() {
            global $db_conn;

            $company = strtolower($_POST['deleteCompanyName']);

            $deleteString = "DELETE FROM Company WHERE LOWER(companyname) = '$company'";
            executePlainSQL($deleteString);
            echo "Deleted Company";
            OCICommit($db_conn);
        }

        function handleDeleteIndustry() {
            global $db_conn;

            $industry = strtolower($_POST['deleteIndustryName']);

            $deleteString = "DELETE FROM Industry WHERE LOWER(industryName) = '$industry'";
            executePlainSQL($deleteString);
            echo "Deleted Industry";
            OCICommit($db_conn);
        }

        function handleDeleteInvestor() {
            global $db_conn;

            $investor = strtolower($_POST['deleteInvestorName']);

            $deleteString = "DELETE FROM Investor WHERE LOWER(investorName) = '$investor'";
            executePlainSQL($deleteString);
            echo "Deleted Investor";
            OCICommit($db_conn);
        }

        function handleViewSelectedData() {
            global $db_conn;
            
            $selectedAttrs = [];
            $selectedAttrs = $_POST['selectedAttributes'];
            $sql = "SELECT ";
            foreach ($selectedAttrs as $attr) {
                $sql .= "$attr, ";
            }
            $sql = rtrim($sql, ", ");
            $tableName = $_POST['tableName'];
            $sql .= " FROM $tableName";
            $result = executePlainSQL($sql);
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
                if (array_key_exists('addCompanySubmit', $_POST)) {
                    handleMakeCompany();
                } else if (array_key_exists('addIndustrySubmit', $_POST)) {
                    handleMakeIndustry();
                } else if (array_key_exists('addInvestorSubmit', $_POST)) {
                    handleMakeInvestor();
                } else if (array_key_exists('updateIndustrySubmit', $_POST)) {
                    handleUpdateIndustry();
                } else if (array_key_exists('updateInvestorSubmit', $_POST)) {
                    handleUpdateInvestor();
                } else if (array_key_exists('updateCompanySubmit', $_POST)) {
                    handleUpdateCompany();
                } else if (array_key_exists('selectedAttributesSubmit', $_POST)) {
                    handleViewSelectedData();
                } else if (array_key_exists('deleteCompanySubmit', $_POST)) {
                    handleDeleteCompany();
                } else if (array_key_exists('deleteIndustrySubmit', $_POST)) {
                    handleDeleteIndustry();
                } else if (array_key_exists('deleteInvestorSubmit', $_POST)) {
                    handleDeleteInvestor();
                } else if (array_key_exists('addCEOSubmit', $_POST)) {
                    handleMakeCEO();
                } else if (array_key_exists('addActiveInSubmit', $_POST)) {
                    handleMakeActiveIn();
                } else if (array_key_exists('addInvestsSubmit', $_POST)) {
                    handleMakeInvests();
                } else if (array_key_exists('addListedOnSubmit', $_POST)) {
                    handleMakeListedOn();
                }


                disconnectFromDB();
            } else {
                echo 'alert("failed to connect to DB")';
            }
        }

        //Note that this code is not inside a function - when the page is loaded by a form this is run!
        // FILE STARTS HERE
        // use submit button names here for search forms, and hidden value names here for navbar links
		if (isset($_POST['addCompanySubmit']) || isset($_POST['addIndustrySubmit']) || isset($_POST['addInvestorSubmit']) || 
            isset($_POST['updateIndustrySubmit']) || isset($_POST['updateInvestorSubmit']) || 
            isset($_POST['updateCompanySubmit']) || isset($_POST['selectedAttributesSubmit']) ||
            isset($_POST['deleteCompanySubmit']) || isset($_POST['deleteIndustrySubmit']) ||
            isset($_POST['deleteInvestorSubmit']) || isset($_POST['addCEOSubmit']) || isset($_POST['addActiveInSubmit']) ||
            isset($_POST['addInvestsSubmit']) || isset($_POST['addListedOnSubmit'])) {
            handlePOSTRequest();
        }
		?>
	</body>
</html>
