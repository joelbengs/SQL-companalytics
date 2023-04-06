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

    <!-- Import the navbar and the hidden HTML forms-->
    <?php include('forms.php');?>

    <body>

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
                Growth Rate: <input type="number" step="any" min="0" name="addCompanyGrowth" class="searchBox">
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
                Average PE Ratio: <input type="number" step="any" min="0" name="addIndustryPE" class="searchBox">
                Average Revenue: <input type="number" step="any" min="0" name="addIndustryRevenue" class="searchBox">
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
                Age: <input type="number" step="any" min="0" name="addCEOAge" class="searchBox">
                Gender: <select name="addCEOGender" id="addCEOGender">
                    <option value=""></option>
                    <option value="MAN">Man</option>
                    <option value="WOMAN">Woman</option>
                </select>
                Education Level:<select name="addCEOEducation" id="addCEOEducation">
                    <option value=""></option>
                    <option value="Highschool Diploma">Highschool Diploma</option>
                    <option value="Bachelors Degree">Bachelor's Degree</option>
                    <option value="Masters Degree">Master's Degree</option>
                    <option value="PHD Degree">PHD</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="Apprenticeship Certificate">Apprenticeship</option>
                </select>
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
                Amount Invested: <input type="number" step="any" min="0" name="addInvestsAmount" class="searchBox">
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
                    StockPrice: <input type="number" step="any" min="0" name="addListedOnPrice" class="searchBox">
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
                Country: <input type="text" name="addCompanyCountry" class="searchBox">
                CEO: <input type="text" name="updateCompanyCEO" class="searchBox">
                Start Date: <input type="text" name="updateCompanyDate" class="searchBox">
                Growth Rate: <input type="number" step="any" min="0" name="updateCompanyGrowth" class="searchBox">
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
                Average PE Ratio: <input type="number" step="any" min="0" name="updateIndustryPE" class="searchBox">
                Average Revenue: <input type="number" step="any" min="0" name="updateIndustryRevenue" class="searchBox">
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
                if ($_POST['updateTableData'] == 'CEO') {
            ?>
            <h2>Update CEO</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateCEO" name="updateCEO">
                Name: <input type="text" name="updateCEOName" class="searchBox" required>
                Age: <input type="number" step="any" min="0" name="updateCEOAge" class="searchBox">
                Gender: <select name="updateCEOGender" id="updateCEOGender">
                    <option value=""></option>
                    <option value="MAN">Man</option>
                    <option value="WOMAN">Woman</option>
                </select>
                Education Level:<select name="updateCEOEducation" id="updateCEOEducation">
                    <option value=""></option>
                    <option value="Highschool Diploma">Highschool Diploma</option>
                    <option value="Bachelors Degree">Bachelor's Degree</option>
                    <option value="Masters Degree">Master's Degree</option>
                    <option value="PHD Degree">PHD</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="Apprenticeship Certificate">Apprenticeship</option>
                </select>
                <input type="submit" value="Update" name="updateCEOSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['updateTableData'] == 'ActiveIn') {
            ?>
            <h2>Update Company's Industry</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateActiveIn" name="updateActiveIn">
                Company Name: <input type="text" name="updateActiveInCompany" class="searchBox" required>
                Industry Name: <input type="text" name="updateActiveInIndustry" class="searchBox" required>
                Active Since: <input type="text" name="updateActiveInDate" class="searchBox">
                <input type="submit" value="Update" name="updateActiveInSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['updateTableData'] == 'InvestedIn') {
            ?>
            <h2>Update Investor's Investments</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateInvests" name="updateInvests">
                Investor Name: <input type="text" name="updateInvestsInvestor" class="searchBox" required>
                Company Name: <input type="text" name="updateInvestsCompany" class="searchBox" required>
                Amount Invested: <input type="number" step="any" min="0" name="updateInvestsAmount" class="searchBox">
                <input type="submit" value="Update" name="updateInvestsSubmit" class="button searchButton"></p>
            </form>

            <?php
                }
                if ($_POST['updateTableData'] == 'ListedOn') {
            ?>
            <h2>Update Stock Exchange Listing</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateListedOn" name="updateCEO">
                Exchange Name: <input type="text" name="updateListedOnExchange" class="searchBox" required>
                Company Name: <input type="text" name="updateListedOnCompany" class="searchBox" required>
                Date Listed: <input type="text" name="updateListedOnDate" class="searchBox">
                Stock Price: <input type="number" step="any" min="0" name="updateListedOnPrice" class="searchBox">
                <input type="submit" value="Update" name="updateListedOnSubmit" class="button searchButton"></p>
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
                if ($_POST['deleteTableData'] == 'CEO') {
            ?>
            <h2>Delete CEO</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteCEO" name="deleteCEO">
                Name: <input type="text" name="deleteCEOName" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteCEOSubmit" class="button searchButton"></p>
            </form>
            <?php
                }
                if ($_POST['deleteTableData'] == 'ActiveIn') {
            ?>
            <h2>Delete Industry Listing</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteActiveIn" name="deleteActiveIn">
                Company Name: <input type="text" name="deleteActiveInCompany" class="searchBox" required>
                Industry Name: <input type="text" name="deleteActiveInIndustry" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteActiveInSubmit" class="button searchButton"></p>
            </form>
            <?php
                }
                if ($_POST['deleteTableData'] == 'InvestedIn') {
            ?>
            <h2>Delete Investment Listing</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteInvests" name="deleteInvests">
                Company Name: <input type="text" name="deleteInvestsCompany" class="searchBox" required>
                Investor Name: <input type="text" name="deleteInvestsInvestor" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteInvestsSubmit" class="button searchButton"></p>
            </form>
            <?php
                }
                if ($_POST['deleteTableData'] == 'ListedOn') {
            ?>
            <h2>Delete Stock Exchange Listing</h2>
            <form method="POST" action="manage.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteListedOn" name="deleteIndustry">
                Company Name: <input type="text" name="deleteListedOnCompany" class="searchBox" required>
                Stock Exchange: <input type="text" name="deleteListedOnExchange" class="searchBox" required>
                <input type="submit" value="Delete" name="deleteListedOnSubmit" class="button searchButton"></p>
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
                //echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                // echo htmlentities($e['message']); // comment this out after
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
            global $db_conn, $success;

            $company = sanitizeInput($_POST['addCompanyName']);
            $companyProduct = sanitizeInput($_POST['addCompanyProduct']);
            $companyTicker = sanitizeInput($_POST['addCompanyTicker']);
            $companyCountry = sanitizeInput($_POST['addCompanyCountry']);
            $companyCEO = sanitizeInput($_POST['addCompanyCEO']);
            $companyCEOStartDate = sanitizeInput($_POST['addCompanyDate']);
            $companyGrowthRate = sanitizeInput($_POST['addCompanyGrowth']);

            // check for existing country
            $checkCountry = executePlainSQL("SELECT countryName FROM Country WHERE LOWER(countryName) = '" . strtolower($companyCountry) . "'");
            $row = OCI_Fetch_Array($checkCountry, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO Country(countryName, primaryLanguage) VALUES ('$companyCountry', 'English')");
                OCICommit($db_conn);
            }
            // check for existing ceo
            $checkCEO = executePlainSQL("SELECT ceoName FROM CEO WHERE LOWER(ceoName) = '" . strtolower($companyCEO) . "'");
            $row = OCI_Fetch_Array($checkCEO, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO CEO(ceoName) VALUES ('$companyCEO')");
                OCICommit($db_conn);
            }

            // check for existing ticker
            $checkUniqueTicker = executePlainSQL("SELECT * FROM Company WHERE LOWER(ticker) = '" . strtolower($companyTicker) . "'");
            $row = OCI_Fetch_Array($checkUniqueTicker, OCI_BOTH);
            if ($row) {
                echo "<div class=\"alertRed\">
                            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                            Ticker symbol already exists. Please enter a unique ticker.
                        </div>";
                return;
            }

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
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Inserted Company.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleMakeIndustry() {
            global $db_conn, $success;

            $industry = sanitizeInput($_POST['addIndustryName']);
            $industryPERatio = sanitizeInput($_POST['addIndustryPE']);
            $industryRevenue = sanitizeInput($_POST['addIndustryRevenue']);

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
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Inserted Industry.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleMakeInvestor() {
            global $db_conn, $success;

            $investor = sanitizeInput($_POST['addInvestorName']);
            $isVC = sanitizeInput($_POST['addInvestorVC']);
            if ($isVC == "True") {
                $investorVC = 1;
            } else {
                $investorVC = 0;
            }

            $insertString = "INSERT INTO Investor(investorName, isVentureCapitalist) VALUES('$investor', $investorVC)";

            executePlainSQL($insertString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Inserted Investor.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleMakeCEO() {
            global $db_conn, $success;

            $ceo = sanitizeInput($_POST['addCEOName']);
            $ceoAge = sanitizeInput($_POST['addCEOAge']);
            $ceoGender = sanitizeInput($_POST['addCEOGender']);
            $ceoEducation = sanitizeInput($_POST['addCEOEducation']);

            $sqlInsert = "INSERT INTO CEO(ceoName";
            $sqlValues = " VALUES('$ceo'";

            if ($ceoAge) {
                $sqlInsert .= ", age";
                $sqlValues .= ", $ceoAge";
            }
            if ($ceoGender) {
                $sqlInsert .= ", gender";
                $sqlValues .= ", '$ceoGender'";
            }
            if ($ceoEducation) {
                $sqlInsert .= ", educationLevel";
                $sqlValues .= ", '$ceoEducation'";
            }
            $sqlInsert .= ") ";
            $sqlValues .= ")";

            $insertString = $sqlInsert . $sqlValues;

            executePlainSQL($insertString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Inserted CEO.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleMakeActiveIn() {
            global $db_conn, $success;

            $company = sanitizeInput($_POST['addActiveInCompany']);
            $industry = sanitizeInput($_POST['addActiveInIndustry']);
            $activeSince = sanitizeInput($_POST['addActiveInSince']);

            // check for existing company
            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Please create the company '$company' before assigning it to an investor.
                    </div>";
                return;
            }
            // check for existing industry
            $checkIndustry = executePlainSQL("SELECT industryName FROM Industry WHERE LOWER(industryName) = '" . strtolower($industry) . "'");
            $row = OCI_Fetch_Array($checkIndustry, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO Industry(industryName) VALUES ('$industry')");
                OCICommit($db_conn);
            }

            $sqlInsert = "INSERT INTO ActiveIn(companyName, industryName";
            $sqlValues = " VALUES('$company', '$industry'";
            if ($activeSince) {
                $sqlInsert .= ", activeSince";
                $sqlValues .= ", '$activeSince'";
            }
            $sqlInsert .= ") ";
            $sqlValues .= ")";

            $insertString = $sqlInsert . $sqlValues;

            executePlainSQL($insertString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Linked Company to Industry.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleMakeInvests() {
            global $db_conn, $success;

            $investor = sanitizeInput($_POST['addInvestsInvestor']);
            $company = sanitizeInput($_POST['addInvestsCompany']);
            $amountInvested = sanitizeInput($_POST['addInvestsAmount']);

            // check for existing company
            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Please create the company '$company' before assigning it to an investor.
                    </div>";
                return;
            }
            // check for existing investor
            $checkInvestor = executePlainSQL("SELECT investorName FROM Investor WHERE LOWER(investorName) = '" . strtolower($investor) . "'");
            $row = OCI_Fetch_Array($checkInvestor, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO Investor(investorName) VALUES ('$investor')");
                OCICommit($db_conn);
            }

            $sqlInsert = "INSERT INTO Invests(investorName, companyName";
            $sqlValues = " VALUES('$investor', '$company'";
            if ($amountInvested) {
                $sqlInsert .= ", amountInvested";
                $sqlValues .= ", '$amountInvested'";
            }
            $sqlInsert .= ") ";
            $sqlValues .= ")";

            $insertString = $sqlInsert . $sqlValues;

            executePlainSQL($insertString);
            echo "Linked Investor to Company";
            OCICommit($db_conn);
        }

        function handleMakeListedOn() {
            global $db_conn, $success;

            $exchangeName = sanitizeInput($_POST['addListedOnExchange']);
            $company = sanitizeInput($_POST['addListedOnCompany']);
            $dateListed = sanitizeInput($_POST['addListedOnDate']);
            $stockPrice = sanitizeInput($_POST['addListedOnPrice']);

            // check for existing company
            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Please create the company '$company' before assigning it to an investor.
                    </div>";
                return;
            }
            // check for existing exchange
            $checkExchange = executePlainSQL("SELECT exchangeName FROM StockExchange WHERE LOWER(exchangeName) = '" . strtolower($exchangeName) . "'");
            $row = OCI_Fetch_Array($checkExchange, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO StockExchange(exchangeName) VALUES ('$exchangeName')");
                OCICommit($db_conn);
            }
            // check for existing stockprice
            if ($stockPrice) {
                $checkStockPrice = executePlainSQL("SELECT stockPrice FROM StockInfo WHERE stockPrice = $stockPrice");
                $row = OCI_Fetch_Array($checkStockPrice, OCI_BOTH);
                if (!$row) {
                    executePlainSQL("INSERT INTO StockInfo(stockPrice) VALUES ($stockPrice)");
                    OCICommit($db_conn);
                }
            }

            $sqlInsert = "INSERT INTO ListedOn(exchangeName, companyName";
            $sqlValues = " VALUES('$exchangeName', '$company'";
            if ($dateListed) {
                $sqlInsert .= ", dateListed";
                $sqlValues .= ", '$dateListed'";
            }
            if ($stockPrice) {
                $sqlInsert .= ", stockPrice";
                $sqlValues .= ", $stockPrice";
            }
            $sqlInsert .= ") ";
            $sqlValues .= ")";

            $insertString = $sqlInsert . $sqlValues;

            executePlainSQL($insertString);
            if ($success) {
                echo "Listed Company on Stock Exchange";
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Listed Company on Stock Exchange.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateIndustry() {
            global $db_conn, $success;

            $industry = sanitizeInput(strtolower($_POST['updateIndustryName']));
            $industryPERatio = sanitizeInput($_POST['updateIndustryPE']);
            $industryRevenue = sanitizeInput($_POST['updateIndustryRevenue']);

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
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated Industry.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateCompany() {
            global $db_conn, $success;

            $company = sanitizeInput(strtolower($_POST['updateCompanyName']));
            $companyProduct = sanitizeInput($_POST['updateCompanyProduct']);
            $companyTicker = sanitizeInput($_POST['updateCompanyTicker']);
            $companyCountry = sanitizeInput($_POST['addCompanyCountry']);
            $companyCEO = sanitizeInput($_POST['updateCompanyCEO']);
            $companyCEOStartDate = sanitizeInput($_POST['updateCompanyDate']);
            $companyGrowthRate = sanitizeInput($_POST['updateCompanyGrowth']);

            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Company '$company' does not exist.
                    </div>";
                return;
            }

            // check for existing country
            if ($companyCountry) {
                $checkCountry = executePlainSQL("SELECT countryName FROM Country WHERE LOWER(countryName) = '" . strtolower($companyCountry) . "'");
                $row = OCI_Fetch_Array($checkCountry, OCI_BOTH);
                if (!$row) {
                    executePlainSQL("INSERT INTO Country(countryName, primaryLanguage) VALUES ('$companyCountry', 'English')");
                    OCICommit($db_conn);
                }
            }
            // check for existing ceo
            if ($companyCEO) {
                $checkCEO = executePlainSQL("SELECT ceoName FROM CEO WHERE LOWER(ceoName) = '" . strtolower($companyCEO) . "'");
                $row = OCI_Fetch_Array($checkCEO, OCI_BOTH);
                if (!$row) {
                    executePlainSQL("INSERT INTO CEO(ceoName) VALUES ('$companyCEO')");
                    OCICommit($db_conn);
                }
            }

            if ($companyTicker) {
                // check for existing ticker
                $checkUniqueTicker = executePlainSQL("SELECT * FROM Company WHERE LOWER(ticker) = '" . strtolower($companyTicker) . "'");
                $row = OCI_Fetch_Array($checkUniqueTicker, OCI_BOTH);
                if ($row) {
                    echo "<div class=\"alertRed\">
                            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                            Ticker symbol already exists. Please enter a unique ticker.
                        </div>";
                    return;
                }
            }

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
            if ($companyCountry) {
                $updateString .= "country = '$companyCountry', ";
            }
            if ($companyCEOStartDate) {
                $updateString .= "ceoDateStarted = '$companyCEOStartDate', ";
            }
            if ($companyGrowthRate) {
                $updateString .= "growthRate = $companyGrowthRate, ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(companyName) = '$company'";

            // TODO: need to check if company exists or not, and to make foreign keys in table
            executePlainSQL($updateString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated Company.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateInvestor() {
            global $db_conn, $success;

            $investor = sanitizeInput(strtolower($_POST['updateInvestorName']));
            $isVC = sanitizeInput($_POST['updateInvestorVC']);
            if ($isVC == "True") {
                $investorVC = 1;
            } else {
                $investorVC = 0;
            }

            $checkInvestor = executePlainSQL("SELECT investorName FROM Investor WHERE LOWER(investorName) = '" . strtolower($investor) . "'");
            $row = OCI_Fetch_Array($checkInvestor, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Investor '$investor' does not exist.
                    </div>";
                return;
            }

            $updateString = "UPDATE Investor SET investorName = '" . ucwords($investor) . "', ";
            if (isset($_POST['updateInvestorVC'])) {
                $updateString .= "isVentureCapitalist = $investorVC, ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(investorName) = '$investor'";

            executePlainSQL($updateString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated Investor.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateCEO() {
            global $db_conn, $success;

            $ceo = sanitizeInput(strtolower($_POST['updateCEOName']));
            $ceoAge = sanitizeInput($_POST['updateCEOAge']);
            $ceoGender = sanitizeInput($_POST['updateCEOGender']);
            $ceoEducation = sanitizeInput($_POST['updateCEOEducation']);
            
            $checkCEO = executePlainSQL("SELECT ceoName FROM CEO WHERE LOWER(ceoName) = '" . strtolower($ceo) . "'");
            $row = OCI_Fetch_Array($checkCEO, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        CEO '$ceo' does not exist.
                    </div>";
                return;
            }

            $updateString = "UPDATE CEO SET ceoName = '" . ucwords($ceo) . "', ";
            if ($ceoAge) {
                $updateString .= "age = $ceoAge, ";
            }
            if ($ceoGender) {
                $updateString .= "gender = '$ceoGender', ";
            }
            if ($ceoEducation) {
                $updateString .= "educationLevel = '$ceoEducation', ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(ceoName) = '$ceo'";

            executePlainSQL($updateString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated CEO.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateListedOn() {
            global $db_conn, $success;

            $exchange = sanitizeInput(strtolower($_POST['updateListedOnExchange']));
            $company = sanitizeInput(strtolower($_POST['updateListedOnCompany']));
            $listedOnDate = sanitizeInput($_POST['updateListedOnDate']);
            $listedOnStockPrice = sanitizeInput($_POST['updateListedOnPrice']);

            // check for existing company
            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Please create the company '$company' before assigning it to an investor.
                    </div>";
                return;
            }
            // check for existing exchange
            $checkExchange = executePlainSQL("SELECT exchangeName FROM StockExchange WHERE LOWER(exchangeName) = '" . strtolower($exchange) . "'");
            $row = OCI_Fetch_Array($checkExchange, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO StockExchange(exchangeName) VALUES ('$exchange')");
                OCICommit($db_conn);
            }
            // check for existing stockprice
            if ($listedOnStockPrice) {
                $checkStockPrice = executePlainSQL("SELECT stockPrice FROM StockInfo WHERE stockPrice = $listedOnStockPrice");
                $row = OCI_Fetch_Array($checkStockPrice, OCI_BOTH);
                if (!$row) {
                    executePlainSQL("INSERT INTO StockInfo(stockPrice) VALUES ($listedOnStockPrice)");
                    OCICommit($db_conn);
                }
            }

            $updateString = "UPDATE ListedOn SET companyName = '" . ucwords($company) . "', exchangeName = '" . ucwords($exchange) . "', ";
            if ($listedOnDate) {
                $updateString .= "dateListed = '$listedOnDate', ";
            }
            if ($listedOnStockPrice) {
                $updateString .= "stockPrice = $listedOnStockPrice, ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(exchangeName) = '$exchange' AND LOWER(companyName) = '$company'";

            executePlainSQL($updateString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated Exchange Listing.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateInvests() {
            global $db_conn, $success;

            $investor = sanitizeInput(strtolower($_POST['updateInvestsInvestor']));
            $company = sanitizeInput(strtolower($_POST['updateInvestsCompany']));
            $investsAmount = sanitizeInput($_POST['updateInvestsAmount']);

            // check for existing company
            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Please create the company '$company' before assigning it to an investor.
                    </div>";
                return;
            }
            // check for existing investor
            $checkInvestor = executePlainSQL("SELECT investorName FROM Investor WHERE LOWER(investorName) = '" . strtolower($investor) . "'");
            $row = OCI_Fetch_Array($checkInvestor, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO Investor(investorName) VALUES ('$investor')");
                OCICommit($db_conn);
            }

            $updateString = "UPDATE Invests SET companyName = '" . ucwords($company) . "', investorName = '" . ucwords($investor) . "', ";
            if ($investsAmount) {
                $updateString .= "amountInvested = $investsAmount, ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(investorName) = '$investor' AND LOWER(companyName) = '$company'";

            executePlainSQL($updateString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated Investment.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleUpdateActiveIn() {
            global $db_conn, $success;

            $company = sanitizeInput(strtolower($_POST['updateActiveInCompany']));
            $industry = sanitizeInput(strtolower($_POST['updateActiveInIndustry']));
            $activeInStartDate = sanitizeInput($_POST['updateActiveInDate']);

            // check for existing company
            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Please create the company '$company' before assigning it to an investor.
                    </div>";
                return;
            }
            // check for existing industry
            $checkIndustry = executePlainSQL("SELECT industryName FROM Industry WHERE LOWER(industryName) = '" . strtolower($industry) . "'");
            $row = OCI_Fetch_Array($checkIndustry, OCI_BOTH);
            if (!$row) {
                executePlainSQL("INSERT INTO Industry(industryName) VALUES ('$industry')");
                OCICommit($db_conn);
            }

            $updateString = "UPDATE ActiveIn SET companyName = '" . ucwords($company) . "', industryName = '" . ucwords($industry) . "', ";
            if ($activeInStartDate) {
                $updateString .= "activeSince = '$activeInStartDate', ";
            }
            $updateString = rtrim($updateString, ", ");
            $updateString .= " WHERE LOWER(industryName) = '$industry' AND LOWER(companyName) = '$company'";

            executePlainSQL($updateString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Updated Industry.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteCompany() {
            global $db_conn, $success;

            $company = sanitizeInput(strtolower($_POST['deleteCompanyName']));

            $checkCompany = executePlainSQL("SELECT companyName FROM Company WHERE LOWER(companyName) = '" . strtolower($company) . "'");
            $row = OCI_Fetch_Array($checkCompany, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Company '" . ucwords($company) . "' does not exist.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM Company WHERE LOWER(companyname) = '$company'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted Company.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteIndustry() {
            global $db_conn, $success;

            $industry = sanitizeInput(strtolower($_POST['deleteIndustryName']));

            $checkIndustry = executePlainSQL("SELECT industryName FROM Industry WHERE LOWER(industryName) = '" . strtolower($industry) . "'");
            $row = OCI_Fetch_Array($checkIndustry, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Industry '" . ucwords($industry) . "' does not exist.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM Industry WHERE LOWER(industryName) = '$industry'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted Industry.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteInvestor() {
            global $db_conn, $success;

            $investor = sanitizeInput(strtolower($_POST['deleteInvestorName']));

            $checkInvestor = executePlainSQL("SELECT investorName FROM Investor WHERE LOWER(investorName) = '" . strtolower($investor) . "'");
            $row = OCI_Fetch_Array($checkInvestor, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Investor '" . ucwords($investor) . "' does not exist.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM Investor WHERE LOWER(investorName) = '$investor'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted Investor.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteCEO() {
            global $db_conn, $success;

            $ceo = sanitizeInput(strtolower($_POST['deleteCEOName']));

            $checkCEO = executePlainSQL("SELECT ceoName FROM CEO WHERE LOWER(ceoName) = '" . strtolower($ceo) . "'");
            $row = OCI_Fetch_Array($checkCEO, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        CEO '" . ucwords($ceo) . "' does not exist.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM CEO WHERE LOWER(ceoName) = '$ceo'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted CEO.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteActiveIn() {
            global $db_conn, $success;

            $company = sanitizeInput(strtolower($_POST['deleteActiveInCompany']));
            $industry = sanitizeInput(strtolower($_POST['deleteActiveInIndustry']));

            $checkActiveIn = executePlainSQL("SELECT companyName, industryName FROM ActiveIn WHERE LOWER(companyName) = '$company' AND LOWER(industryName) = '$industry'");
            $row = OCI_Fetch_Array($checkActiveIn, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Company '" . ucwords($company) . "' is not active in '" . ucwords($industry) . "'.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM ActiveIn WHERE LOWER(companyName) = '$company' AND LOWER(industryName) = '$industry'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted Industry Listing.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteListedOn() {
            global $db_conn, $success;

            $company = sanitizeInput(strtolower($_POST['deleteListedOnCompany']));
            $exchange = sanitizeInput(strtolower($_POST['deleteListedOnExchange']));

            $checkListedOn = executePlainSQL("SELECT companyName, exchangeName FROM ListedOn WHERE LOWER(companyName) = '$company' AND LOWER(exchangeName) = '$exchange'");
            $row = OCI_Fetch_Array($checkListedOn, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Company '" . ucwords($company) . "' is not listed on '" . ucwords($exchange) . "'.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM ListedOn WHERE LOWER(companyName) = '$company' AND LOWER(exchangeName) = '$exchange'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted Stock Exchange Listing.
                    </div>";
            }
            OCICommit($db_conn);
        }

        function handleDeleteInvests() {
            global $db_conn, $success;

            $company = sanitizeInput(strtolower($_POST['deleteInvestsCompany']));
            $investor = sanitizeInput(strtolower($_POST['deleteInvestsInvestor']));

            $checkInvests = executePlainSQL("SELECT companyName, investorName FROM Invests WHERE LOWER(companyName) = '$company' AND LOWER(investorName) = '$investor'");
            $row = OCI_Fetch_Array($checkInvests, OCI_BOTH);
            if (!$row) {
                echo "<div class=\"alertRed\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Investor '" . ucwords($investor) . "' has not invested in '" . ucwords($company) . "'.
                    </div>";
                return;
            }

            $deleteString = "DELETE FROM Invests WHERE LOWER(companyName) = '$company' AND LOWER(investorName) = '$investor'";
            executePlainSQL($deleteString);
            if ($success) {
                echo "<div class=\"alert\">
                        <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                        Deleted Investment Listing.
                    </div>";
            }
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
                } else if (array_key_exists('updateCEOSubmit', $_POST)) {
                    handleUpdateCEO();
                } else if (array_key_exists('updateListedOnSubmit', $_POST)) {
                    handleUpdateListedOn();
                } else if (array_key_exists('updateInvestsSubmit', $_POST)) {
                    handleUpdateInvests();
                } else if (array_key_exists('updateActiveInSubmit', $_POST)) {
                    handleUpdateActiveIn();
                } else if (array_key_exists('deleteCEOSubmit', $_POST)) {
                    handleDeleteCEO();
                } else if (array_key_exists('deleteActiveInSubmit', $_POST)) {
                    handleDeleteActiveIn();
                } else if (array_key_exists('deleteInvestsSubmit', $_POST)) {
                    handleDeleteInvests();
                } else if (array_key_exists('deleteListedOnSubmit', $_POST)) {
                    handleDeleteListedOn();
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
		if (isset($_POST['addCompanySubmit']) || isset($_POST['addIndustrySubmit']) || isset($_POST['addInvestorSubmit']) || 
            isset($_POST['updateIndustrySubmit']) || isset($_POST['updateInvestorSubmit']) || 
            isset($_POST['updateCompanySubmit']) || isset($_POST['selectedAttributesSubmit']) ||
            isset($_POST['deleteCompanySubmit']) || isset($_POST['deleteIndustrySubmit']) ||
            isset($_POST['deleteInvestorSubmit']) || isset($_POST['addCEOSubmit']) || isset($_POST['addActiveInSubmit']) ||
            isset($_POST['addInvestsSubmit']) || isset($_POST['addListedOnSubmit']) || isset($_POST['updateCEOSubmit']) ||
            isset($_POST['updateListedOnSubmit']) || isset($_POST['updateInvestsSubmit']) ||
            isset($_POST['updateActiveInSubmit']) || isset($_POST['deleteCEOSubmit']) || isset($_POST['deleteActiveInSubmit']) ||
            isset($_POST['deleteInvestsSubmit']) || isset($_POST['deleteListedOnSubmit'])) {
            handlePOSTRequest();
        }
		?>
	</body>
</html>
