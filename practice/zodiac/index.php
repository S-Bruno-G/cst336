<?php
      	function specialYears($start, $end) {
      	    $total = 0;
      	    $pics = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
      	    $k = 0;
      	    for($i = $start; $i <= $end; $i++) {
      	        //if($i %4 == 0) {
      	            $total += $i;
          	        echo "<li> Year " .$i;
          	        if($i == 1776) {
          	            echo "<strong> USA INDEPENDENCE!</strong>";
          	        }
          	        if($i %100 == 0) {
          	            echo "<strong> Happy New Century!</strong>";
          	        }
          	        echo '</li>';
          	        if($k == 12) {
          	            $k = 0;
          	        }
          	        echo "<img src='img/".$pics[$k].".png' alt='hello' title='blank' />";
          	        $k++;
      	        //}
      	        
      	    }
      	    return $total;
      	}
      	    
      	?>
<html><head>
        <title> </title>
        <style>
        </style>
    </head>
    <body >
        <h1>Zodiac</h1>
      <main>
      	
        </main>
         <form>
          Start Year:<br>
          <input type="text" name="startyear" value="0">
          <br>
          End Year:<br>
          <input type="text" name="endyear" value="0">
          <br><br>
          <input type="submit" value="Submit">
        </form> 
        <?php
            specialYears($_GET['startyear'], $_GET['endyear']);
         ?>  
    
</body></html>