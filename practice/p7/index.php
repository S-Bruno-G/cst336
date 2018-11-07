<?php
include 'dbConnection2.php';
$dbConn = startConnection("c9");

    function orderQuote() {
        global $dbConn;
        
        $sql = "SELECT * FROM `q_quotes` ORDER BY quote ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    function getQuote() {
        global $dbConn;
        //$namedParameters = array();
        $product = $_GET['keyword'];
        
        $sql = "SELECT * FROM `p1_quotes` WHERE 1"; //Gettting all records from database
    
        if (!empty($product)){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND quote LIKE $product";
             //$namedParameters[':product'] = "%$product%";
        }
        
        if (!empty($_GET['category'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND category = '".$_GET['category']."'";
              //$namedParameters[':category'] = $_GET['category'] ;
        }
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option>" .$record['quote']."(".$record['author']. ")<option>";
            
        }
        
    }
    
    function getDrop() {
        global $dbConn;
        
        $sql = "SELECT DISTINCT category FROM `p1_quotes`";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option>" .$record['category']."</option>";
            
        }
        
    }
    
    function getCat() {
        global $dbConn;
        $cat = $_GET['category'];
        
        $sql = "SELECT * FROM `p1_quotes` WHERE category LIKE '%$cat%'";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<h3>".$record['quote']. '('. $record['author'].")</h3>";
            
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Quote Finder </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
        </style>
    </head>
    <body>

        <div class="jumbotron">
            <h1> Famous Quote Finder </h1>
        </div>
      
        <form>
            Enter Quote Keyword <input type="text" name="keyword" value="" /><br><br>
            Category:
            <select name="category">
                <option value=""> Select One </option>
                <?= getDrop(); ?>
            </select><br><br>
            Order
            <br>
            <input type="radio" name="orderBy" value="az"
                /> A-Z <br>
            <input type="radio" name="orderBy" value="za"
                /> Z-A <br>
              
            <br>
            
            <input type="submit" value="Display Quotes!"/>

      </form>
      
      
      <hr>
      
        <div id="quotes">
          <?= getQuote();?>
        </div>
      
    </body>
</html>
