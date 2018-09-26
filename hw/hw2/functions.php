<?php
        function image($random_value) {
            if($random_value == 0) {
                $symbol = "seven";
            } else if($random_value == 1) {
                $symbol = "orange";
            } else if($random_value == 2) {
                $symbol = "cherry";
            } else {
                $symbol = "lemon";
            }
            echo "<img id='pic' src=\"img/$symbol.png\" alt='A $symbol' width='70' title='blank' ".ucfirst($symbol).", pic />";
        }

        
        ?>