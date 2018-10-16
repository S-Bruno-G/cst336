<?php
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
        echo $_GET['month']." Itinerary";
        echo "<br>";
        echo "Visiting ".$_GET['locationsNum']." places in ".$_GET['country'];
        echo "<br>";
    }
    
    function displayMonth($month) {
        $counter = 1;
        echo "<table>
            for($i = 0; $i < 7; $i++) {
                if($counter < 29) {
                <tr>$counter</tr>
                $counter++;
            }
            
        </table>";
       
    }
        
?>
<!DOCTYPE html>
<html>
    <head>
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
                
                <input type="submit" id="submitButton" value="Create Itinerary">
            </form>
            
        </div>
    </body>
    <?php
        if(validForm()) {
            echo "<br>";
            displaySelectedInfo();
            displayMonth($_GET['month']);
        }
    ?>
    <br>
    <footer>
        
    </footer>
</html>
