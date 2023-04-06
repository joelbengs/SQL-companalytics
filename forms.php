<div id="company-navigation-bar" class="topnav">

    <!--Company logo-->
    <div class="topnav-centered">
        <a href="https://www.students.cs.ubc.ca/~bengs/oracle-test.php"><img src="artifacts/companalytics.png" alt="Companalytics"></a>
    </div>

    <!--This form is hidden from view, but submitted as HTTP POST when link below is pressed.-->
    <!--The form is prefilled with values.-->
    <!--When this form is submitted, the file under action will be called with the array $_POST containing the string "showIndustriesTable"-->
    <!--INDUSTRIES-->
    <form method="POST" id="showIndustries" action="tables.php" style="display: none;">
        <input type="hidden" id="showIndustriesTable" value="showIndustriesTable" name="showIndustriesTable">
        <p><input type="submit" value="industry" name="showIndustry"></p>
    </form>

    <!--This is the clickable text that the user can see and press to submit the above hidden form-->
    <?= '<a href="#" onclick="document.getElementById(\'showIndustries\').submit(); ">Industries</a>'; ?>

    <!--INVESTOR-->
    <form method="POST" id="showInvestors" action="tables.php" style="display: none;">
        <input type="hidden" id="showInvestorsTable" value="showInvestorsTable" name = "showInvestorsTable">
        <input type="submit" value="investor" name="showInvestor">
    </form>

    <?= '<a href="#" onclick="document.getElementById(\'showInvestors\').submit();">Investors</a>'; ?>

    <!--COMPANIES-->
    <form method="POST" id="showCompanies" action="tables.php" style="display: none;">
        <input type="hidden" id="showCompaniesTable" value="showCompaniesTable" name="showCompaniesTable">
        <p><input type="submit" value="company" name="showCompany"></p>
    </form>

    <?= '<a href="#" onclick="document.getElementById(\'showCompanies\').submit(); ">Companies</a>'; ?>

    <!--SEARCH-->
    <form action="oracle-test.php" method="POST" id="showSearch" style="display: none;">
        <input type="submit">Search</input>
    </form>

    <?= '<a href="#" onclick="document.getElementById(\'showSearch\').submit(); ">Search</a>'; ?>

     <!--MANAGE-->
     <form method="POST" id="managePage" action="manage.php" style="display: none;">
        <input type="hidden" id="goToManage" value="manage" name="goToManage">
        <p><input type="submit" value="manage" name="manage"></p>
    </form>

    <?= '<a href="#" onclick="document.getElementById(\'managePage\').submit(); ">Manage Database</a>'; ?>

    <div class="topnav-right">
        <?= '<a>Contact Us</a>'; ?>
        <?= '<a>About</a>'; ?>
    </div>
    
</div>