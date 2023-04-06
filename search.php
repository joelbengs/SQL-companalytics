
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

         <!-- import functions for SQL execution and database connection -->
        <?php include('dbfunctions.php');?>

        <div id = "all-content">

            <div class = "displayDiv">
                <h2>Search Industries</h2>
                <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
                    Industry Name: <input type="text" name="industryName" class="searchBox">
                    PE Ratio: <input type="text" name="peRatio" class="searchBox">
                    Minimum Revenue: <input type="text" name="revenue" class="searchBox">
                    <input type="submit" value="Search" name="searchIndustriesSubmit" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->

            <div class = "displayDiv">
                <h2>Search Investors</h2>
                <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorName" class="searchBox">
                    <input type="submit" value="Search" name="searchInvestorsSubmit" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->

            <div class = "displayDiv">
                <h2>Search Companies</h2>
                <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
                    Company Name: <input type="text" name="companyName" class="searchBox">
                    <input type="submit" value="Search" name="searchCompaniesSubmit" class="button searchButton"></p>
                </form>
            </div>

            <br><br>

            <div class = "displayDiv">
                <h2>Find Above Average Industries Per Investor</h2>
                <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorAboveAverage" class="searchBox">
                    <input type="submit" value="Search" name="searchAboveAverage" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->
            <div class = "displayDiv">
                <h2>Find Industrial Commitment Per Investor</h2>
                <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
                    Investor Name: <input type="text" name="investorCommit" class="searchBox">
                    <input type="submit" value="Search" name="searchIndustrialCommit" class="button searchButton"></p>
                </form>
            </div>

            <!-- <hr /> -->
            <div class = "displayDiv">
                <h2>View Total Amount Invested Per Industry</h2>
                <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
                    Industry: <input type="text" name="investorNameTotal" class="searchBox">
                    <input type="submit" value="Search" name="searchTotalInvest" class="button searchButton"></p>
                </form>
            </div>

            <hr />

            <h2>Search For The Youngest CEOs By Gender Per Degree</h2>
            <form method="POST" action="search.php" class = "displayForm"> <!--refresh page when submitted-->
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

        // when the user clicks search on industries, displays all info relevant to that industry
        function handleSearchIndustries() {
            global $db_conn;

            // sanitize the user input from $_POST so that it can be safely used in a query
            
            $industryName = sanitizeInput($_POST['industryName']);
            $peRatio = sanitizeInput($_POST['peRatio']);
            $revenue = sanitizeInput($_POST['revenue']);
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
                    $sql .= " AND AVERAGEREVENUE >= " . $revenue . "";
                } else {
                    $sql .= " WHERE AVERAGEREVENUE >= " . $revenue . "";
                }
            }
            $result = executePlainSQL($sql);
            printAllData($result);
        }

        function handleSearchInvestors() {
            global $db_conn;
            $investorName = sanitizeInput($_POST['investorName']);
            if ($investorName == '') {
                $resultA = executePlainSQL("SELECT * FROM Investor");
                printAllData($resultA);
            } else {
                $resultA = executePlainSQL("SELECT * FROM Investor WHERE LOWER(investorName) = '" . strtolower($investorName) . "'");
                $resultB = executePlainSQL("SELECT I.companyName, I.amountInvested, C.country, A.industryName FROM Invests I, Company C, ActiveIn A WHERE I.companyName = C.companyName AND C.companyName = A.companyName AND LOWER(investorName) = '" . strtolower($investorName) . "'");
                printAllData($resultA);
                printAllData($resultB);
            }
        }

        function handleSearchCompanies() {
            global $db_conn;

            $companyName = sanitizeInput($_POST['companyName']);

            if ($companyName == '') {
                $result = executePlainSQL("SELECT * FROM Company");
            } else {
                $result = executePlainSQL("SELECT * FROM Company WHERE LOWER(companyName) = '" . strtolower($companyName) . "'");
            }
            printAllData($result);
        }

        function handleSearchAboveAverage() {
            global $db_conn;

            $investorName = sanitizeInput($_POST['investorAboveAverage']);
            $result = executePlainSQL("SELECT '". ucwords($investorName) . "' invName, Temp.industryName indName, ROUND(Temp.growthRate, 3) avgGR 
                                        FROM ( SELECT A.industryName, AVG(C.growthRate) as growthRate
                                            FROM Invests Inv, Company C, ActiveIn A
                                            WHERE C.companyName = Inv.companyName AND A.companyName = C.companyName 
                                            AND LOWER(Inv.investorName) = '". strtolower($investorName) . "' 
                                            GROUP BY A.industryName ) Temp 
                                        WHERE Temp.growthRate > (SELECT AVG(growthRate) FROM Company)");
            printAllData($result);
        }

        function handleSearchCEOs() {
            global $db_conn;

            $gender = sanitizeInput($_POST['ceoGender']);
            $result = executePlainSQL("SELECT min(age) age, educationLevel
                                    FROM CEO
                                    WHERE gender = '" . $gender . "'
                                    GROUP BY educationLevel
                                    HAVING count(*) > 1");
            printAllData($result);
        }

        function handleTotalInvest() {
            global $db_conn;

            $investorName = sanitizeInput($_POST['investorNameTotal']);
            $result = executePlainSQL("SELECT sum(amountInvested) amount, industryName
                                       FROM Invests I, ActiveIn AI
                                       WHERE LOWER(investorName) = '" . strtolower($investorName) . "'
                                       AND AI.companyName = I.companyName
                                       GROUP BY AI.industryName");
            printAllData($result);
        }

        function handleIndustrialCommit() {
            global $db_conn;
            $investorName = sanitizeInput($_POST['investorCommit']);
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
                if (array_key_exists('searchIndustriesSubmit', $_POST)) {                    handleCompaniesRequest();
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

        function sanitizeInput($input){
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        // use submit button names here for search forms, and hidden value names here for navbar links
		if (isset($_POST['searchIndustriesSubmit']) || isset($_POST['searchCompaniesSubmit']) || isset($_POST['searchInvestorsSubmit']) || 
            isset($_POST['searchAboveAverage']) || isset($_POST['searchCEOs']) || isset($_POST['searchTotalInvest']) || 
            isset($_POST['searchIndustrialCommit'])) {
            handlePOSTRequest();

        }
		?>
	</body>
</html>
