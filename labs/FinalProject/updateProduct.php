<?php
session_start();

include 'dbConnectionFifa.php';
$dbConn = startConnection("fifa");
include 'functions.php';
validateSession();

if (isset($_GET['playerId'])) {
  $productInfo = getProductInfo($_GET['playerId']);
 // print_r($productInfo);
}

//function updateItems() {
    if (isset($_GET['updateProduct'])){  //user has submitted update form
        $playerName = $_GET['playerName'];
        $playerPrice =  $_GET['playerPrice'];
        $nationId =  $_GET['nationId'];
        $leagueId = $_GET['leagueId'];
        $clubId =  $_GET['clubId'];
        $playerLink = $_GET['playerLink'];
        
        $sql = "UPDATE table_player 
                SET playerName= :playerName,
                   playerPrice = :playerPrice,
                   nationId = :nationId,
                   leagueId = :leagueId,
                   clubId = :clubId,
                   playerLink = :playerLink
                WHERE playerId = " . $_GET['playerId'];
             
        $np = array();
        $np[":playerName"] = $playerName;
        $np[":playerLink"] = $playerLink;
        $np[":playerPrice"] = $playerPrice;
        $np[":nationId"] = $nationId;
        $np[":clubId"] = $clubId;
        $np[":leagueId"] = $leagueId;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        header("Location: admin.php");
        
    }
//}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Player! </title>
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
            #updateProduct{
                background-color: lightyellow;
            }
            #updateProduct:hover{
                background-color: yellow;
            }
            #bar{
                /*background: linear-gradient(to bottom, #000000 0%, #ffffff 250%);*/
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

        <h1> Updating Player </h1>
        
        <form>
            <input type="hidden" name="playerId" value="<?=$productInfo['playerId']?>">
           Player name: <input type="text" name="playerName" value="<?=$productInfo['playerName']?>"><br><br>
           Player Price: <input type="text" name="playerPrice" value="<?=$productInfo['playerPrice']?>"><br><br>
           Nationality: 
           <select name="nationId">
              <option value="">Select One</option>
              <?php
                  $categories = getCategories();
                  foreach ($categories as $category) {
                      echo "<option  "; 
                      echo  ($category['nationId']==$productInfo['nationId'])?"selected":"";
                      echo " value='".$category['nationId']."'>" . $category['nationName'] . "</option>";
                  }
              ?>
           </select> <br /><br>
           League: 
           <select name="leagueId">
              <option value="">Select One</option>
              <?php
                  $categories = getleague();
                  foreach ($categories as $category) {
                      echo "<option  "; 
                      echo  ($category['leagueId']==$productInfo['leagueId'])?"selected":"";
                      echo " value='".$category['leagueId']."'>" . $category['leagueName'] . "</option>";
                  }
              ?>
           </select> <br /><br>
           Club: 
           <select name="clubId">
              <option value="">Select One</option>
              <?php
                  $categories = getClub();
                  foreach ($categories as $category) {
                      echo "<option  "; 
                      echo  ($category['clubId']==$productInfo['clubId'])?"selected":"";
                      echo " value='".$category['clubId']."'>" . $category['clubName'] . "</option>";
                  }
              ?>
           </select> <br /><br>
           Set Image Url: <input type="text" name="playerLink" value="<?=$productInfo['playerLink']?>"><br><br>
           <input type="submit" name="updateProduct" id="updateProduct" value="Update Product">
        </form>
        <br><br>
        <form action="admin.php">
            <input type="submit" name="done" id="done" value="Done">
        </form>
        
    </body></center>
</html>