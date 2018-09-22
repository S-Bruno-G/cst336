<?php

    function displayArray() {
        global $symbol;
        echo "<hr>";
        for($i = 0; $i < count($symbol); $i++) {
           echo $symbol[$i] . ", ";
        }
    }

    $symbol = array("seven");
    print_r($symbol); //Displays array content
    
    
    $points = array("orange"=>250, "cherry"=>500);
    $points["seven"] = 1000;
    //echo $points["orange"];
    
    
    array_push($symbol,"orange","grapes");
    print_r($symbol);
    
    $symbol[] = "cherry"; //Also adds element to end of array
    //print_r($symbol);
    displayArray();
    
    unset($symbol[2]);
    $symbol = array_values($symbol);
    displayArray();
    
    $indexes = array();
    
    echo "<br>";
    for($i = 0; $i < 3; $i++) {
        $indexes[] = $symbol[array_rand($symbol)];
        echo "<img src='../lab2/img/" . $indexes[$i] . ".png'>";
    }
    echo "<br>";
    print_r($indexes);
    
    if($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2]) {
        echo "<h1>YES!!! You won </h1>" . $points[ $indexes[0] ] . "<h1>points.</h1>";
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Review: Arrays </title>
    </head>
    <body>

    </body>
</html>