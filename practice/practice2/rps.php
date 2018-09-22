<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>
    
    <?php
        
        function randomPick1($random_value1) {
            switch($random_value1) {
                case 0: $symbol1 = "rock";
                        break;
                case 1: $symbol1 = "paper";
                        break;
                case 2: $symbol1 = "scissors";
                        break;
            }
        }
        
        function randomPick2($random_value2) {
            switch($random_value2) {
                case 0: $symbol2 = "rock";
                        break;
                case 1: $symbol2 = "paper";
                        break;
                case 2: $symbol2 = "scissors";
                        break;
            }
        }
        
        $symbol1;
        $symbol2;
        $random_value1 = rand(0,2);
        $random_value2;
        do {
            $random_value2 = rand(0,2);
        } while ($random_value2 == $random_value1);
        
        randomPick1($random_value1);
        randomPick2($random_value2);
        
        ?>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <div class="row">
        <div class='col'><img src='img/rps/scissors.png' alt='scissors' width='150'></div>
        <div class='col, matchWinner'><img src='img/rps/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div class="row">
        <div class='col'><img src='img/rps/rock.png' alt='rock' width='150'></div>
        <div class='col, matchWinner'><img src='img/rps/paper.png' alt='paper' width='150'></div>
    </div>
    <hr>
    
    <div class="row">
        <div class='col, matchWinner'><img src='img/rps/paper.png' alt='paper' width='150'></div>
        <div class='col'><img src='img/rps/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div id="finalWinner">

        <h1>The winner is Player 2</h1>

    </div>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
