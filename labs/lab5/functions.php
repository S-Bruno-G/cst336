<?php
    function displayResults() {
        global $items;
        
        if(isset($items)) {
            echo "<table class='table'>";
            foreach($items as $item) {
                $itemName = $item['name'];
                $itemPrice = $item['salePrice'];
                $itemImage = $item['thumbnailImage'];
                $itemId = $item['itemId'];
                
                echo '<tr>';
                echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$$itemPrice</h4></td>";
                
                echo "<form method='post'>
                    <input type='hidden' name='itemName' value='$itemName'>
                    <input type='hidden' name='itemPrice' value='$itemPrice'>
                    <input type='hidden' name='itemImage' value='$itemImage'>
                    <input type='hidden' name='itemId' value='$itemId'>";
                    
                    if($_POST['itemId'] == $itemId) {
                        echo "<td><button class='btn btn-warning'>Added</button></td>";
                    } else {
                        echo "<td><button class='btn btn-warning'>Add</button></td>";
                    }
                
                echo "</tr>
                    </form>";
            }
            echo "</table>";
        }
    }
    
    function displayCart() {
        if(isset($_SESSION['cart'])) {
            echo "<table class='table'>";
            foreach($_SESSION['cart'] as $item) {
                $itemId = $item['id'];
                $itemQuant = $item['quantity'];
                
                echo '<tr>';
                echo "<td><img src='".$item['img']."'></td>
                    <td><h4>".$item['name']."</h4></td>
                    <td><h4>$".$item['price']."</h4></td>
                    
                    <form method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <td><input type='text' name='update' class='form-control' placeHolder='$itemQuant'></td>
                    <td><button class='btn btn-danger'>Update</button></td>
                    </form>
                    
                    <form method='post'>
                    <input type='hidden' name='removeId' value='$itemId'>
                    <td><button class='btn btn-danger'>Remove</button></td>
                    </form>
                    
                    </tr>";
            }
            echo "</table>";
        }
    }
    
    function displayCartCount() {
        echo count($_SESSION['cart']);
    }
?>