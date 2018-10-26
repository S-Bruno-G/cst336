<?php
    session_start();
    if(!isset($_SESSION['MonthlyIt'])) {
        $_SESSION['MonthlyIt'] = array();
    }
    
    function makeIt() {
        $newItem = array();
        $overide = false;
        if(isset($_SESSION['MonthlyIt'])) {
            foreach($_SESSION['MonthlyIt'] as &$item) {
                if($item['month'] == $_GET['month']) {
                    $item['locationsNum'] = $_GET['locationsNum'];
                    $item['country'] = $_GET['country'];
                    $overide = true;
                }
            }
            if(!$overide) {
                $newItem['month'] = $_GET['month'];
                $newItem['locationsNum'] = $_GET['locationsNum'];
                $newItem['country'] = $_GET['country'];
                
                array_push($_SESSION['MonthlyIt'], $newItem);
            }
        }
    }
    
    function displayIt() {
        if(isset($_SESSION['MonthlyIt'])) {
            foreach($_SESSION['MonthlyIt'] as $item) {
                $itemMonth = $item['month'];
                $itemLocationsNum = $item['locationsNum'];
                $itemCountry = $item['country'];
                
                echo "<td><h3>Month: ".$item['month'].", Visiting ".$item['locationsNum']." places in ".$item['country']."</h3></td>
                    <br>";
            }
        }
    }
    
    $Fr = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
    $US = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
    $Mex = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
    $Fr1 = array();
    $Mex1 = array();
    $US1 = array();
    function validForm() {
        $valid = true;
        if(!isset($_GET['month'])) {
            echo "You must select a Month!";
            echo "<br>";
            $valid = false;
        }
        
        if(!isset($_GET['locationsNum'])) {
            echo "You must specify the number of locations!";
            echo "<br>";
            $valid = false;
        }
        return $valid;
    }
    
    function displaySelectedInfo() {
        echo "<strong>".$_GET['month']."</strong> Itinerary";
        echo "<br>";
        echo "Visiting <strong>".$_GET['locationsNum']."</strong> places in <strong>".$_GET['country']."</strong>";
        echo "<br>";
    }
    
    function displayImage($country, $index) {
        
        if($country == "France") {
            displayFr($index);
        } else if($country == "Mexico") {
            displayMex($index);
        } else {
            displayUS($index);
        }
    }
    
    function displayUS($index) {
        global $US1;
        $str = str_replace('_',' ',$US1[$index]);
        $str = ucwords($str);
        echo "<img src='img/USA/$US1[$index].png' alt= '$str' title='$str' width= '65px'/>";
        echo "<br>";
        echo $str;
    }
    
    function displayFr($index) {
        global $Fr1;
        $str = str_replace('_',' ',$Fr1[$index]);
        $str = ucwords($str);
        echo "<img src='img/France/$Fr1[$index].png' alt= '$str' title= '$str' width= '65px'/>";
        echo "<br>";
        echo $str;
    }
    
    function displayMex($index) {
        global $Mex1;
        $str = str_replace('_',' ',$Mex1[$index]);
        $str = ucwords($str);
        echo "<img src='img/Mexico/$Mex1[$index].png' alt= '$str' title= '$str' width= '65px'/>";
        echo "<br>";
        echo $str;
    }
    
    function displayMonth($month) {
        if($month == "December" || $month == "January") {
            displayDecJan();
        } else if($month == "November") {
            displayNov();
        } else {
            displayFeb();
        }
    }
    
    function sortAZ() {
        global $Fr1;
        global $Mex1;
        global $US1;
        sort($Fr1);
        sort($Mex1);
        sort($US1);
    }
    
    function sortZA() {
        global $Fr1;
        global $Mex1;
        global $US1;
        rsort($Fr1);
        rsort($Mex1);
        rsort($US1);
    }
    
    function visit() {
        global $Fr;
        global $Mex;
        global $US;
        global $Fr1;
        global $Mex1;
        global $US1;
        if($_GET['locationsNum'] == 3) {
            for($i = 0; $i < 3; $i++) {
                array_push($Fr1, $Fr[$i]);
                array_push($Mex1, $Mex[$i]);
                array_push($US1, $US[$i]);
            }
        } else if($_GET['locationsNum'] == 4) {
            for($i = 0; $i < 4; $i++) {
                array_push($Fr1, $Fr[$i]);
                array_push($Mex1, $Mex[$i]);
                array_push($US1, $US[$i]);
            }
        } else {
            for($i = 0; $i < 5; $i++) {
                array_push($Fr1, $Fr[$i]);
                array_push($Mex1, $Mex[$i]);
                array_push($US1, $US[$i]);
            }
        }
    }
    
    function numDays($days, $counter) {
        if($_GET['locationsNum'] == 3) {
            for($i = 0; $i < 3; $i++) {
                if($days[$i] == $counter) {
                    return true;
                }
            }
        } else if($_GET['locationsNum'] == 4) {
            for($i = 0; $i < 4; $i++) {
                if($days[$i] == $counter) {
                    return true;
                }
            }
        } else {
            for($i = 0; $i < 5; $i++) {
                if($days[$i] == $counter) {
                    return true;
                }
            }
        }
        return false;
    }
    
    function makeDaysN() {
        $arr = array();
        $x = rand(1,30);
        $y = rand(1,30);
        while($y == $x) {
            $y = rand(1,30);
        }
        $z = rand(1,30);
        while($z == $x || $z == $y) {
            $z = rand(1,30);
        }
        $a = rand(1,30);
        while($a == $x || $a == $y || $a == $z) {
            $a = rand(1,30);
        }
        $b = rand(1,30);
        while($b == $x || $b == $y || $b == $z || $b == $a) {
            $b = rand(1,30);
        }
        array_push($arr, $x);
        array_push($arr, $y);
        array_push($arr, $z);
        array_push($arr, $a);
        array_push($arr, $b);
        return $arr;
    }
    
    function makeDaysDJ() {
        $arr = array();
        $x = rand(1,31);
        $y = rand(1,31);
        while($y == $x) {
            $y = rand(1,31);
        }
        $z = rand(1,31);
        while($z == $x || $z == $y) {
            $z = rand(1,31);
        }
        $a = rand(1,31);
        while($a == $x || $a == $y || $a == $z) {
            $a = rand(1,31);
        }
        $b = rand(1,31);
        while($b == $x || $b == $y || $b == $z || $b == $a) {
            $b = rand(1,31);
        }
        array_push($arr, $x);
        array_push($arr, $y);
        array_push($arr, $z);
        array_push($arr, $a);
        array_push($arr, $b);
        return $arr;
    }
    function makeDaysF() {
        $arr = array();
        $x = rand(1,28);
        $y = rand(1,28);
        while($y == $x) {
            $y = rand(1,28);
        }
        $z = rand(1,28);
        while($z == $x || $z == $y) {
            $z = rand(1,28);
        }
        $a = rand(1,28);
        while($a == $x || $a == $y || $a == $z) {
            $a = rand(1,28);
        }
        $b = rand(1,28);
        while($b == $x || $b == $y || $b == $z || $b == $a) {
            $b = rand(1,28);
        }
        array_push($arr, $x);
        array_push($arr, $y);
        array_push($arr, $z);
        array_push($arr, $a);
        array_push($arr, $b);
        return $arr;
    }
    
    function shuffleCountry($c) {
        if($c == "USA") {
            global $US;
            shuffle($US);
        } else if($c == "France") {
            global $Fr;
            shuffle($Fr);
        } else {
            global $Mex;
            shuffle($Mex);
        }
    }
    
    function displayDecJan() {
        $days = array();
        $counter = 1;
        $index = 0;
        shuffleCountry($_GET['country']);
        
        $days = makeDaysDJ();
        visit();
        if($_GET['order'] == "a-z") {
            sortAZ();
        } else if($_GET['order'] == "z-a") {
            sortZA();
        }
        echo "<table>";
        while($counter < 35) {
            echo "<tr>";
            for($j = 0; $j < 7; $j++) {
                if($counter < 32) {
                    echo "<td>".$counter;
                    echo "<br>";
                    if(numDays($days, $counter)) {
                        displayImage($_GET['country'], $index);
                        $index++;
                    }
                    echo "</td>";
                } else {
                    echo "<td></td>";
                }
                $counter++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function displayNov() {
        $days = array();
        $counter = 1;
        $index = 0;
        shuffleCountry($_GET['country']);
        
        $days = makeDaysN();
        visit();
        if($_GET['order'] == "a-z") {
            sortAZ();
        } else if($_GET['order'] == "z-a") {
            sortZA();
        }
        echo "<table>";
        while($counter < 35) {
            echo "<tr>";
            for($j = 0; $j < 7; $j++) {
                if($counter < 31) {
                    echo "<td>".$counter;
                    echo "<br>";
                    if(numDays($days, $counter)) {
                        displayImage($_GET['country'], $index);
                        $index++;
                    }
                    echo "</td>";
                } else {
                    echo "<td></td>";
                }
                $counter++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function displayFeb() {
        $days = array();
        $counter = 1;
        $index = 0;
        shuffleCountry($_GET['country']);
        
        $days = makeDaysF();
        visit();
        if($_GET['order'] == "a-z") {
            sortAZ();
        } else if($_GET['order'] == "z-a") {
            sortZA();
        }
        echo "<table>";
        while($counter < 29) {
            echo "<tr>";
            for($j = 0; $j < 7; $j++) {
                if($counter < 29) {
                    echo "<td>".$counter;
                    echo "<br>";
                    if(numDays($days, $counter)) {
                        displayImage($_GET['country'], $index);
                        $index++;
                    }
                    echo "</td>";
                } else {
                    echo "<td></td>";
                }
                $counter++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Winter Vacation Planner </title>
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
        <style>
        </style>
        <h1>Winter Vacation Planner</h1>
        
    </head>
    <body>
        
        <div id="main">
            
            <form method='GET'>
                <label for="month">Select Month: </label>
                <select id="month" name="month">
                    <option value="" disabled selected>Select</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                </select>
                <br>
                
                <label for="locationsNum">Number of Locations: </label>
                <input type="radio" id="locationsNum" name="locationsNum" value="3"> Three
                <input type="radio" id="locationsNum" name="locationsNum" value="4"> Four
                <input type="radio" id="locationsNum" name="locationsNum" value="5"> Five
                <br>
                
                <label for="country">Select a Country: </label>
                <select id="country" name="country">
                    <option value="USA">USA</option>
                    <option value="Mexico">Mexico</option>
                    <option value="France">France</option>
                </select>
                <br>
                
                <label for="order">Visit locations in alphabetical order: </label>
                <input type="radio" id="order" name="order" value="a-z"> A-Z
                <input type="radio" id="order" name="order" value="z-a"> Z-A
                <br>
                
                <input type="submit" id="submitButton" name="submit" value="Create Itinerary">
            </form>
            
        </div>
    </body>
    <br>
    <?php
        if($_GET['submit'] == "Create Itinerary") {
            if(validForm()) {
                echo "<br>";
                displaySelectedInfo();
                echo "<br>";
                echo "<br>";
                displayMonth($_GET['month']);
                makeIt();
                displayIt();
            }
        }
        
    ?>
    <br>
    <footer>
          
        <table border="1" width="600">
        <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
        <tr style="background-color:#99E999">
        <td>1</td>
        <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
        <td width="20" align="center">5</td>
        </tr>
        <tr style="background-color:#99E999">
        <td>2</td>
        <td>Errors are displayed if month or number of locations are not submitted.</td>
        <td width="20" align="center">5</td>
        </tr> 
        <tr style="background-color:#99E999">
        <td>3</td>
        <td>Header and Subheader are displayed with info submitted. </td>
        <td align="center">5</td>
        </tr>    
        <tr style="background-color:#99E999">
        <td>4</td>
        <td>A table with days and weeks is displayed when submitting the form</td>
        <td align="center">5</td>
        </tr> 
        <tr style="background-color:#99E999">
        <td>5</td>
        <td>The number of days in the table correspond to the month selected</td>
        <td align="center">10</td>
        </tr>
        <tr style="background-color:#99E999">
        <td>6</td>
        <td>Random images are displayed in random days</td>
        <td align="center">5</td>
        </tr>       
        <tr style="background-color:#99E999">
        <td>7</td>
        <td>The number of random images correspond to the number of locations and country submitted</td>
        <td align="center">10</td>
        </tr>  
        <tr style="background-color:#99E999">
        <td>8</td>
        <td>The proper name of the location is displayed below the image 
          	(e.g. "New York", "Las Vegas")</td>
        <td align="center">10</td>
        </tr>  
        <tr style="background-color:#99E999">
        <td>9</td>
        <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
        <td align="center">15</td>
        </tr>    
        <tr style="background-color:#99E999">
        <td>10</td>
        <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
        <td align="center">15</td>
        </tr>        
        <tr style="background-color:#99E999">
        <td>11</td>
        <td>The web page uses Bootstrap and has a nice look. </td>
        <td align="center">5</td>
        </tr>        
           <tr style="background-color:#99E999">
        <td>12</td>
        <td>This rubric is properly included AND UPDATED (BONUS)</td>
        <td width="20" align="center">2</td>
        </tr>
        <tr>
        <td></td>
        <td>T O T A L </td>
        <td width="20" align="center"><b></b></td>
        </tr> 
        </tbody></table>

    </footer>
</html>
