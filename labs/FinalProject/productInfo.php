<?php
session_start();

include 'dbConnectionFifa.php';
$dbConn = startConnection("fifa");
include 'functions.php';
validateSession();

if (isset($_GET['playerId'])) {
  $productInfo = getProductInfo($_GET['playerId']);    
  //print_r($productInfo);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Player Info </title>
        <!--<link rel='stylesheet' href='css/styles.css' type='text/css' />-->
        <style>
            body{
                text-align: center;
                background: linear-gradient(to bottom, #808080 0%, #ffff99 100%);
            }
        </style>
    </head>
    <body>
    
    <h1><?=$productInfo['playerName']?></h1>
     <img src='<?=$productInfo['playerLink']?>' height='300'/>
     <h2>Nationality: <?php
                  $categories = getCategories();
                  foreach ($categories as $category) {
                      if($category['nationId'] == $productInfo['nationId']) {
                          echo $category['nationName'];
                      }
                  }
              ?><br>
        Club: <?php
                  $categories = getClub();
                  foreach ($categories as $category) {
                      if($category['clubId'] == $productInfo['clubId']) {
                          echo $category['clubName'];
                      }
                  }
              ?><br>
        League: <?php
                  $categories = getLeague();
                  foreach ($categories as $category) {
                      if($category['leagueId'] == $productInfo['leagueId']) {
                          echo $category['leagueName'];
                      }
                  }
              ?>.
    </h2>
 
    </body>
</html>