<?php
        function play() {
            for($i = 1; $i < 4; $i++) {
                ${"randomValue" . $i} = rand(0,3);
                displaySymbol(${"randomValue" . $i}, $i);
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
        }
        
        
        function displaySymbol($random_value, $pos) {
            switch($random_value) {
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "cherry";
                        break;
                case 2: $symbol = "lemon";
                        break;
                case 3: $symbol = "orange";
                        break;
            }
            echo "<img id='reel$pos' src=\"img/$symbol.png\" alt='A $symbol' width='70' title='blank' ".ucfirst($symbol).", pic />";
        }
            
        function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            echo "<div id='output'>";
            if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch($randomValue1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            break;
                    case 1: $totalPoints = 500;
                            break;
                    case 2: $totalPoints = 250;
                            break;
                    case 3: $totalPoints = 900;
                            break;
                }
                echo "<h2>You won $totalPoints points!</h2>";
            } else {
                echo "<h3>Try Again!</h3>";
            }
            echo "</div>";
        }
        
        // function display() {
        //     $random_value1 = rand(0,3);
        //     displaySymbol($random_value1);
        //     $random_value2 = rand(0,3);
        //     displaySymbol($random_value2);
        //     $random_value3 = rand(0,3);
        //     displaySymbol($random_value3);
            
        //     displayPoints($random_value1, $random_value2, $random_value3);
        // }
        
        ?>