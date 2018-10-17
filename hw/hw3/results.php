<?php
    function total() {
        $result = 0;
        if($_GET['spell'] == "cat") {
            $result++;
        }
        if(isset($_GET['freePoint'])) {
            $result++;
        }
        if($_GET['>than'] == "1") {
            $result++;
        }
        if($_GET['squareRoot'] == "4") {
            $result++;
        }
        if($_GET['add'] == "0") {
            $result++;
        }
        return $result;
    }
    
    function q1() {
        $word = $_GET['spell'];
        if($word == "cat") {
            echo "<label for='q1'>&#9989 1. Type the word ''cat''</label>";
        } else {
            echo "<label for='q1'>&#10060 1. Type the word ''cat''</label>";
        }
    }
    
    function q2() {
        if(isset($_GET['freePoint'])) {
            echo "<label for='q2'>&#9989 2. Do you want a free point? Check the box for a free point.</label><br>";
            echo "<input type='checkbox' id='q2' name='freePoint' value='1' disabled selected checked> Free point?";
        } else {
            echo "<label for='q2'>&#10060 2. Do you want a free point? Check the box for a free point.</label><br>";
            echo "<input type='checkbox' id='q2' name='freePoint' value='1' disabled selected> Free point?";
        }
    }
    
    function q3() {
        $check = $_GET['>than'];
        if($check == "1") {
            echo "<label for='q3'>&#9989 3. Which number is greater than 0?</label>";
        } else {
            echo "<label for='q3'>&#10060 3. Which number is greater than 0?</label>";
        }
        echo "<br>";
        if( $check == "1") {
            echo "a.<input type='radio' id='q3' name='>than' value='-1' disabled selected> -1<br>";
            echo "b.<input type='radio' id='q3' name='>than' value='0' disabled selected> 0<br>";
            echo "c.<input type='radio' id='q3' name='>than' value='1' color='aqua' disabled selected checked> 1";
        } else if( $check == "-1") {
            echo "a.<input type='radio' id='q3' name='>than' value='-1' disabled selected checked> -1<br>";
            echo "b.<input type='radio' id='q3' name='>than' value='0' disabled selected> 0<br>";
            echo "c.<input type='radio' id='q3' name='>than' value='1' disabled selected> 1";
        } else if( $check == "0") {
            echo "a.<input type='radio' id='q3' name='>than' value='-1' disabled selected> -1<br>";
            echo "b.<input type='radio' id='q3' name='>than' value='0' disabled selected checked> 0<br>";
            echo "c.<input type='radio' id='q3' name='>than' value='1' disabled selected> 1";
        }
    }
    
    function q4() {
        $check = $_GET['squareRoot'];
        
        if($check == "4") {
            echo "<label for='q4'>&#9989 4. What is the square root of 16?</label>";
        } else {
            echo "<label for='q3'>&#10060 4. What is the square root of 16?</label>";
        }
        echo "<br><select id='q4' name='squareRoot' disabled selected>";
        
        if($check == "4") {
            echo "<option value='4'>4</option>";
        } else if($check == "32") {
            echo "<option value='32'>32</option>";
        } else if($check == "8") {
            echo "<option value='8'>8</option>";
        }
        
        echo "</select>";
    }
    
    function q5() {
        $check = $_GET['add'];
        
        if($check == "0") {
            echo "<label for='q5'>&#9989 5. What is 9+10?</label>";
        } else {
            echo "<label for='q5'>&#10060 5. What is 9+10?</label>";
        }
        
        echo "<br><select id='q5' name='add' disabled selected>";
        
        if($check == "0") {
            echo "<option value='0'>none of the above</option>";
        } else if($check == "21") {
            echo "<option value='21'>21</option>";
        } else if($check == "1") {
            echo "<option value='1'>1</option>";
        } else if($check == "18") {
            echo "<option value='18'>18</option>";
        }
        
        echo "</select>";
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
        
        <center><div id="titleR">
            <h1>Quiz Results</h1>
        </div></center>
        
        <center><div id="mainR">
            
            <form action='index.php'>
                
                <?php
                    q1();
                ?>
                <br>
                <input type="text" id="q1" name="spell" placeholder="Type here.." value=<?php echo $_GET['spell']; ?> disabled selected>
                <br>
                <br>
                <?php
                    q2();
                ?>
                <br>
                <br>
                <?php
                    q3();
                ?>
                <br>
                <br>
                <?php
                    q4();
                ?>
                <br>
                <br>
                <?php
                    q5();
                ?>
                <br>
                <br>
                
                <input type="submit" value="Take another quiz">
            </form>
            
        </div></center>
        
    </body>
    <br>
    <?php
        echo "<h1 id='points'>Your score is: ".total()."/5</h1>";
    ?>
    <!--<hr width='75%' size='10px' color='#a6a6a6'>-->
    <!--<footer>-->
    <!--    CST336 Internet Programming. 2018-->
    <!--    &copy; 2018 Santiago Bruno<br />-->
    <!--    <strong> Disclaimer: </strong> The information in this website is fictitous. It's used for academic purposes only.-->
    <!--    <br />-->
    <!--    <img src = "img/csumb_logo.jpg" alt = "CSUMB logo" title = "This is the CSUMB logo" width = "50px" />-->
    <!--    <img src = "img/buddy.png" alt = "Buddy verification logo" title = "This is the Buddy verification logo" width = "50px" />-->
    <!--</footer>-->
</html>
