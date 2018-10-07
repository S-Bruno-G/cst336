<?php
    // Calculates the time
    $start_time = microtime(TRUE);
    session_start();
    
    function gamesPlayed() {
        if (empty($_SESSION['counter']))
            $_SESSION['counter'] = 1;
        else
            $_SESSION['counter']++;
    }

?>
<?php
    
    function getWinner($players){
        require_once('makePlayerDecks.php');
        
        //Going to add the winner to this string
        $texts = "";
        $max = 0;
        $playerIndex = array();
        $totalSum = 0;
        
        //getPlayers() returns an array. Each index is a player and holds the players hand as well as points
        // $players = getPlayers();
        
        //going through a for loop and iterating through all 4 players indexs and checking their score
        //whoever is less than or equal to 42 and greater than max is the winner.
        for($ii = 0; $ii < 4; $ii++){
            if($players[$ii]->getPoints() <= 42 && $players[$ii]->getPoints() > $max){
                $max = $players[$ii]->getPoints();
                //$totalSum += $players[$ii]->getPoints();
                //array_push($playerIndex, $ii);
            }
        }
        
        for($ii = 0; $ii < 4; $ii++){
            if($players[$ii]->getPoints() == $max){
                array_push($playerIndex, $ii);
            }
        }
        
        
        for($k = 0; $k < 4; $k++){
            if(!in_array($k, $playerIndex)){
                $totalSum += $players[$k]->getPoints();
            }
        }
        
        //returns winners name and total
        if($max != 0){
            for($i = 0; $i < count($playerIndex); $i++){
                //$texts .= $players[$i]->getName(). " won! The sum of the over all score is $totalSum";
                echo ("<b>".$players[$playerIndex[$i]]->getName()."</b>"." won! The sum of the over all score is <b>$totalSum</b>");
                echo '<br>';
            }
        }
        else{
            //$texts .= "No one won.";
            echo("No one won.");
        }
    }
?>