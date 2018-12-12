<?php
session_start();

include 'dbConnectionFifa.php';
$dbConn = startConnection("fifa");
include 'functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    $playerName = $_GET['playerName'];
    $playerPrice =  $_GET['playerPrice'];
    $nationId =  $_GET['nationId'];
    $leagueId = $_GET['leagueId'];
    $clubId =  $_GET['clubId'];
    $playerLink = $_GET['playerLink'];
    
    
    $sql = "INSERT INTO table_player (playerName, playerLink, playerPrice, nationId, leagueId, clubId) 
            VALUES (:playerName, :playerLink, :playerPrice, :nationId, :leagueId, :clubId);";
    $np = array();
    $np[":playerName"] = $playerName;
    $np[":playerLink"] = $playerLink;
    $np[":playerPrice"] = $playerPrice;
    $np[":nationId"] = $nationId;
    $np[":clubId"] = $clubId;
    $np[":leagueId"] = $leagueId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<script>alert('Player Added');</script>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Player </title>
        <style>
            form {
                display: inline-block;
            }
            #done{
                background-color: limegreen;
            }
            #done:hover{
                background-color: lightgreen;
            }
            #addProduct{
                background-color: lightyellow;
            }
            #addProduct:hover{
                background-color: yellow;
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
                        <a style="text-decorations:none; color:white; font-size:30px;" href='admin.php'>Admin</a>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'>|</a>
                        <a style="text-decorations:none; color:#ff5d00; font-size:30px;" href='logout.php'>Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <h1> Add New Player </h1>
        
        <form>
           Player name: <input type="text" name="playerName"><br><br>
           Price: <input type="text" name="playerPrice"><br><br>
           Nationality:
           <select name="nationId">
              <option value="">Select One</option>
              <?php
                  $categories = getCategories();
                  foreach ($categories as $category) {
                      echo "<option value='".$category['nationId']."'>" . $category['nationName'] . "</option>";
                  }
              ?>
           </select> <br><br>
           League:
           <select name="leagueId">
              <option value="">Select One</option>
              <?php
                  $categories = getLeague();
                  foreach ($categories as $category) {
                      echo "<option value='".$category['leagueId']."'>" . $category['leagueName'] . "</option>";
                  }
              ?>
           </select> <br><br>
           Club:
           <select name="clubId">
              <option value="">Select One</option>
              <?php
                  $categories = getClub();
                  foreach ($categories as $category) {
                      echo "<option value='".$category['clubId']."'>" . $category['clubName'] . "</option>";
                  }
              ?>
           </select> <br><br>
           Set Image Url: <input type="text" name="playerLink"><br><br>
           <input type="submit" name="addProduct" id="addProduct" value="Add Product">
        </form><br><br>
        <form action="admin.php">
            <input type="submit" name="done" id="done" value="Done">
        </form>

    </body>
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