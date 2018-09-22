<?php

    function getLuckyNum() {
            
        do {
            $x = rand(1,10);
        } while ($x == 4);
        echo $x;
    }
    
    function getRanColor() {
        echo "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
    }
    
    ?>


<!DOCTYPE html>
<html>
    <head>
        <title> Random Colors & Numbers </title>
        <style>
        
        body {
            
            <?php
            
            $red = rand(0,255);
            
            echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
            
            ?>
        }
        
        h1 {
            
            <?php
            
            echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
            echo "color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
            
            ?>
        }
        
        h2 {
            
            echo "background-color: <?php getRanColor(); ?>
            
        }
            
        </style>
    </head>
    <body>


        <h1>
            My lucky number is: <?php getLuckyNum(); ?>
            
        </h1>


    </body>
</html>