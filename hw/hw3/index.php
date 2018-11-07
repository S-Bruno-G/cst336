<?php
    function validForm() {
        $valid = true;
        if($_GET['spell']=="") {
            echo "<h2 style='color:#ff0000;'>You didn't answer question #1!</h2>";
            $valid = false;
        }
        if(!isset($_GET['freePoint'])) {
            echo "<h2 style='color:#ff0000;'>You didn't answer question #2!</h2>";
            $valid = false;
        }
        if(!isset($_GET['>than'])) {
            echo "<h2 style='color:#ff0000;'>You didn't answer question #3!</h2>";
            $valid = false;
        }
        if(!isset($_GET['squareRoot'])) {
            echo "<h2 style='color:#ff0000;'>You didn't answer question #4!</h2>";
            $valid = false;
        }
        if(!isset($_GET['add'])) {
            echo "<h2 style='color:#ff0000;'>You didn't answer question #5!</h2>";
            $valid = false;
        }
        
        return $valid;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 </title>
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
        <style>
        </style>
        
    </head>
    <body>
        <center><div id="title">
            <h1>Take a Quiz</h1>
        </div></center>
        
        <center><div id="main">
            
            <form method='GET'>
                
                <label for="q1">1. Type the word "cat".</label>
                <br>
                <input type="text" id="q1" name="spell" placeholder="Type here.." required>
                <br>
                <br>
                
                <label for="q2">2. Do you want a free point? Check the box for a free point.</label><br>
                <input type="checkbox" id='q2' name="freePoint" value="1"> Free point?
                <br>
                <br>
                
                <label for="q3">3. Which number is greater than 0?</label>
                <br>
                a.<input type="radio" id="q3" name=">than" value="-1" required> -1<br>
                b.<input type="radio" id="q3" name=">than" value="0"> 0<br>
                c.<input type="radio" id="q3" name=">than" value="1"> 1
                <br>
                <br>
                
                <label for="q4">4. What is the square root of 16?</label>
                <br>
                <select id="q4" name="squareRoot" required>
                <option value="" disabled selected>-Select your answer-</option>
                <option value="32">32</option>
                <option value="4">4</option>
                <option value="8">8</option>
                </select>
                <br>
                <br>
                
                <label for="q5">5. What is 9+10?</label>
                <br>
                <select id="q5" name="add">
                <option value="" disabled selected>-Select your answer-</option>
                <option value="21">21</option>
                <option value="1">1</option>
                <option value="18">18</option>
                <option value="0">none of the above</option>
                </select>
                <br>
                <br>
                
                <input type="submit" name="submit" value="Submit">
            </form>
            
        </div></center>
        
    </body>
    <br>
    <?php
    if($_GET['submit'] == "Submit") {
        if(!validForm()) {
            echo "<h2>Try again!</h2>";
        } else{
            echo "<hr width='100%' size='10px' color='#a6a6a6'>";
            require_once('results.php');
        }
    }
    ?>
    <hr width='75%' size='10px' color='#a6a6a6'>
    <footer>
        CST336 Internet Programming. 2018
        &copy; 2018 Santiago Bruno<br />
        <strong> Disclaimer: </strong> The information in this website is fictitous. It's used for academic purposes only.
        <br />
        <img src = "img/csumb_logo.jpg" alt = "CSUMB logo" title = "This is the CSUMB logo" width = "50px" />
        <img src = "img/buddy.png" alt = "Buddy verification logo" title = "This is the Buddy verification logo" width = "50px" />
    </footer>
</html>
