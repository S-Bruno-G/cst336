<?php

include 'dbConnection1.php';
$dbConn = startConnection("midterm");

function step1() { 
    global $dbConn;
    
    $sql = "SELECT * FROM `mp_town` WHERE population BETWEEN 50000 AND 80000";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<h3>".$record['town_name']." - " .$record['population']."</h3>";
    }
}

function step2() { 
    global $dbConn;
    
    $sql = "SELECT * FROM `mp_town` ORDER BY population DESC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<h3>".$record['town_name']." - " .$record['population']."</h3>";
    }
}

function step3() { 
    global $dbConn;
    
    $sql = "SELECT * FROM `mp_town` ORDER BY population ASC LIMIT 3";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<h3>".$record['town_name']." - " .$record['population']."</h3>";
    }
}

function step4() { 
    global $dbConn;
    
    $sql = "SELECT * FROM `mp_county` WHERE county_name LIKE 'S%'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<h3>".$record['county_name']."</h3>";
    }
}

function step5() { 
    global $dbConn;
    
    $sql = "SELECT * FROM `mp_town` INNER JOIN mp_county ON mp_town.county_id = mp_county.county_id";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<h3>".$record['county_name']." - ".$record['town_name']."</h3>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Midterm 2 practice</title>
    </head>
    <body>
        
        <h1> Midterm Practice</h1>
        <hr>
        <?= step1(); ?>
        <br>
        <hr>
        <br>
        <?= step2(); ?>
        <br>
        <hr>
        <br>
        <?= step3(); ?>
        <br>
        <hr>
        <br>
        <?= step4(); ?>
        <br>
        <hr>
        <br>
        <?= step5(); ?>
        
    


    </body>
</html>