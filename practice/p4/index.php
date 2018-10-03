
<html>
<body>
<head><h1>Aces vs Kings</h1></head>
<h2>Garred Murphy and Santiago Bruno</h2>
<?php
require_once('deck.php');
?>

<table>
<?php
    $deck = new Deck($_POST["omit"]);
    //for (;$deck->getSize() > 0;)
    $aces = 0;
    $kings = 0;
    
    for ($j = 0; $j <$_POST["rows"]; $j++)
    {
        echo "<tr>";
    for ($i = 0; $i <$_POST["columns"]; $i++)
    {
        $newCard = $deck->drawCard();
        if ($newCard->getPoints() == 1)
        {
            echo "<td bgcolor='yellow'><img src='". $newCard->getImg() ."' /></td>";
            $aces++;
        }
        else if ($newCard->getPoints() == 13)
        {
            echo "<td bgcolor='cyan'><img src='". $newCard->getImg() ."' /></td>";
            $kings++;
        }
        else {echo "<td><img src='". $newCard->getImg() ."' /></td>";}
    }
    echo "</tr>";
    }

?>
</table>
    <?php
    echo "Aces: " . $aces . "<br />";
    echo "Kings: ". $kings . "<br />";
    
    if ($aces > $kings)
    {
        echo "Aces win";
    } else if ($aces < $kings)
    {
        echo "Kings win";
    } else {
        echo "Draw";
    }
    ?>

<form method='POST'>
Number of Rows: <input type="text" name="rows"><br><br>
Number of Columns: <input type="text" name="columns"><br><br>
Suit to omit:<select name ="omit">
                <option value="heart">Hearts</option>
                <option value="diamond">Diamonds</option>
                <option value="spade">Spades</option>
                <option value="club">Clubs</option>
            </select>
    <input type="submit">
</form>


</body>
</html>