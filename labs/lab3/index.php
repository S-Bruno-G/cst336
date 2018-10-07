<html>

    
    <head>
            <title>SilverJack</title>
            <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
        <body>
            <div id="container">
                <h1>SILVERJACK</h1>
                <?php
                    
                    include 'findWinner.php';
                    include 'makePlayerDecks.php';
                    
                    // Displays each player name with their correspondings cards and points
                    // Modified findWiner.php to account for multiple winners
                    $players = getPlayers();
                    for($i = 0; $i < 4; $i++) {
                        echo "<img src='img/spongebob/". $players[$i]->getImg() ."' /'>";
                        echo ("<b>".$players[$i]->getName()."</b>");
                        echo ': ';
                        for($k = 0; $k < count($players[$i]->getHand()); $k++) {
                            echo "<img src='". $players[$i]->getHand()[$k]->getImg() ."' />";
                        }
                        echo ("<b>---->".$players[$i]->getPoints()."</B>");
                        echo '<br>';
                    }
                    echo '<br>';
                    
                    getWinner($players);
                    echo '<br>';
                
                ?>
                
                
                <?php gamesPlayed();?>
                    You have played <b><?php echo $_SESSION['counter']; ?></b> times <br>
                    
                    <?php
                    // Calculates the time
                    
                    $end_time = microtime(TRUE);
                    $time_taken =($end_time - $start_time)*1000;
                    $time_taken = round($time_taken,5);
                    echo 'Page generated in '.$time_taken.' seconds.';
                    
                    $_SESSION['timeTaken'] += $time_taken;
                    $_SESSION['avgTime'] = $_SESSION['timeTaken'] /$_SESSION['counter'];
                    echo "<br>";
                    ?>
                
                    Avg Load time is <?php echo round($_SESSION['avgTime'],5).' seconds.';
                ?>
                <br /> <br />
                
                <form id="button">
                    <input type ="submit" value = "PLAY AGAIN!" />
                </form>
                
            </div>
        </body>
</html>