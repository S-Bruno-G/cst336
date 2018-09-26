<?php
        function image($random_value) {
            if($random_value == 0) {
                $symbol = "leo";
            } else if($random_value == 1) {
                $symbol = "don";
            } else if($random_value == 2) {
                $symbol = "raf";
            } else {
                $symbol = "mikey";
            }
            echo "<img id='pic' src=\"img/$symbol.jpg\" alt='A $symbol' title='blank' ".ucfirst($symbol).", pic />";
        }
        
        function attributes() {
            $num = rand(1,99);
            if($num < 25) {
                echo "<td style='color: red;'> ".$num." </td>";
            } else if($num < 50) {
                echo "<td style='color: orange;'> ".$num." </td>";
            } else if($num < 75) {
                echo "<td style='color: blue;'> ".$num." </td>";
            } else {
                echo "<td style='color: green;'> ".$num." </td>";
            }
                    
        }

        
        ?>