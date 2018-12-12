<?php
    include 'dbConnectionFifa.php';
    $dbConn = startConnection("fifa");
    
    $sql ="SELECT MAX(playerPrice) FROM table_player";
        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($records as $i) {
            echo $i['MAX(playerPrice)'];
        }
   
?>