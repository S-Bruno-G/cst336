<?php
    include 'dbConnectionFifa.php';
    $dbConn = startConnection("fifa");
    include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FIFA Catalog&#174;</title>
        <style>
            form {
                display: inline-block;
            }
            #bar{
                background-color: black;
                height: 100px;
                text-align: left;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    
    <center><body>
        <!-- Bootstrap Navagation Bar -->
        <div id='bar'>
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'><b>FIFA Catalog&#174;</b></a>
                    <!--<ul class='nav navbar-nav'>-->
                    
                        <a style="text-decorations:none; color:lightgreen; font-size:30px;" href='index.php'>Home   </a>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'>|</a>
                        <a style="text-decorations:none; color:white; font-size:30px;" href='login.php'>Login</a>
                    </div>
                </div>
            </nav>
        </div>
            <!--<br /> <br /> <br />-->
            
            <h1>FIFA Catalog&#174; Search</h1>
            <!--<h2>Search</h2>-->
        <form>
            Player Name: <input type="text" name="productName" placeholder="Product keyword" class ="searchInputs"/> <br />
            
            Nations: 
            <select name="category" class ="searchInputs">
               <option value=""> -Select one- </option>  
               <?=displayNations()?>
            </select>
            <br>
            Price: From: <input type="number" name="priceFrom" size="7" class ="searchInputs"/> 
             To: <input type="number" name="priceTo" size="7" class ="searchInputs"/>
            <br>
            
            Order Price By <br>
              <input type="radio" name="orderBy" value="low-high"
                <?php if ($_GET['orderBy'] == "ASC") {
                //echo "checked";
                } ?>
                /> low-high <br>
              <input type="radio" name="orderBy" value="high-low"
                <?php if ($_GET['orderBy'] == "DECS") {
                //echo "checked";
                } ?>
                /> high-low <br>
            <br>
            Order Name By<br>
                <input type = "radio" name = "orderBy" value ="az">A-Z
                <input type = "radio" name = "orderBy" value ="za">Z-A
               <br />
            <input id='search' type="submit" name="submit" value="Search!"/>
        </form>
        <br>
        <!--<hr>-->
        
        <?php
            if($_GET['submit'] == "Search!") {
                // echo "<h2>Search Results </h2>";
                filterProducts();
            }
        ?>
        
    </body></center>
    <hr id='bottom' width='100%' size='10px' color='#a6a6a6'>
    <center><footer>
		CST336 Internet Programming. 2018
        &copy; 2018 Santiago Bruno<br />
        <strong> Disclaimer: </strong> The information in this website is fictitous. It's used for academic purposes only.
        <br />
        <img src = "img/csumb_logo.jpg" alt = "CSUMB logo" title = "This is the CSUMB logo" width = "50px" />
        <img src = "img/buddy.png" alt = "Buddy verification logo" title = "This is the Buddy verification logo" width = "50px" />
    </footer></center>
</html>