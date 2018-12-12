<?php
    // include 'dbConnectionFifa.php';
    // $dbConn = startConnection("fifa");
    
    // used to display categories for dropdown
    function displayNations() {
        global $dbConn;
        
        $sql = "SELECT * FROM table_nation ORDER BY nationName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='".$record['nationId']."'>" .$record['nationName']. "</option>";
        }
    }
    
    function filterProducts() {
        global $dbConn;
        
        $namedParameters = array();
        $product = $_GET['productName'];
      
        $sql = "SELECT * FROM table_player WHERE 1"; //Gettting all records from database
        
        if (!empty($product)){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND playerName LIKE :product";
             $namedParameters[':product'] = "%$product%";
        }
        
        if (!empty($_GET['category'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND nationId =  :category";
              $namedParameters[':category'] = $_GET['category'] ;
        }
        
        if (!empty($_GET['priceFrom'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND playerPrice >=  :priceFrom";
              $namedParameters[':priceFrom'] = $_GET['priceFrom'] ;
        }
        
        if (!empty($_GET['priceTo'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND playerPrice <=  :priceTo";
              $namedParameters[':priceTo'] = $_GET['priceTo'] ;
        }
        
        
        if (isset($_GET['orderBy'])) {
        if ($_GET['orderBy'] == "low-high") {
            $sql .= " ORDER BY playerPrice ASC";
        } else if ($_GET['orderBy'] == "high-low"){
                
                $sql .= " ORDER BY playerPrice DESC";
            }else if($_GET['orderBy'] == "az"){
                $sql .= " ORDER BY playerName ASC";
            }else{
                $sql .= " ORDER BY playerName DESC";
            }
    }
    
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        //print_r($records);
        
        // echo "<table class='table'>";
        // foreach ($records as $record) {
        //     //echo "<hr width='75%'>";
        //     echo "<tr>";
        //     echo "<td><img src='" . $record['playerLink'] . "'  width='175px' , height='260px'></td>";
        //     echo "<td>";
        //     echo "<h2>".$record['playerName']."</h2>";
        //     echo "</a><h2></td>";
        //     echo "<td><h2>Price: $" .$record['playerPrice']. "</h2></td>";
        //     echo "<td><form method ='post'>";
        //     echo "<input type='hidden' name = itemName value='". $record['playerName'] ."'>";
        //     echo "<input type='hidden' name = itemPrice value='". $record['playerPrice'] ."'>";
        //     echo "<input type='hidden' name = itemImage value='". $record['playerLink'] ."'>";
        //     echo "<input type='hidden' name = itemId value='". $record['playerId'] ."'>";
        //     echo "</form></td>";
        //     echo "</tr>";
        // }
        // echo "</table>";
        $counter = 0;
        echo "<div style= 'background: linear-gradient(to top, #808080 14%, #ffff99 100%);'>";
        foreach ($records as $record) {
            if($counter %2 == 0) {
                echo "<br>";
            }
            $counter++;
            // echo "<hr width='75%'>";
            echo "<div style= 'background: linear-gradient(to top, #808080 14%, #ffff99 100%); padding: 25px;display: inline-block;'><table>";
            echo "<tr>";
            echo "<th rowspan='5'><img src='" . $record['playerLink'] . "'  width='175px' , height='260px'></th>";
            echo "</tr>";
            echo "<tr><td>&nbsp</td></tr>";
            echo "<tr><td><b>".$record['playerName']."</b></td></tr>";
            echo "<tr>";
            echo "<td><b>Price: $".$record['playerPrice']."</b></td>";
            echo "</tr>";
            echo "<tr><td>&nbsp</td></tr>";
            echo "</table></div>";
        }
        echo "</div>";
    }
    
    function displayProductInfo(){
        global $dbConn;
        
        $productId = $_GET['playerId'];
        $sql = "SELECT * 
                FROM fs_purchase 
                NATURAL RIGHT JOIN fs_product 
                WHERE productId = $productId";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll returns an Array of Arrays
        
        $amount = $records[0]['quantity'];
        $price = $records[0]['price'];
        $date = $records[0]['purchaseDate'];
        
        echo "<img src='" . $records[0]['productImage'] . "'  width='30%'>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        if (empty($records[0]['purchaseId'])) {
            echo "<h3> Product hasn't been purchased yet </h3>";
            $amount = "N/A";
            //$price = 0;
            $date = "N/A";
        }
        
        echo "<center>";
        echo "<table id='productHistory'>";
        
        //echo "<th>Description-</th><th>Quantity-</th><th>Unit Price-</th><th>Purchase Date</th>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<th>Product Name:</th>";
            echo "<td>".$record[productName]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Description:</th>";
            echo "<td>".$record[productDescription]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Purchase Qty:</th>";
            echo "<td>".$amount."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Unit Price:</th>";
            echo "<td>$".$price."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Purchase Date:</th>";
            echo "<td>".$date."</td>";
            echo "</tr>";  
        }
        echo "</table>";
        echo "</center>";
        
        //print_r($records);
        
    }
    
    
    
    function validateSession(){
        if (!isset($_SESSION['adminFullName'])) {
            header("Location: login.php");  //redirects users who haven't logged in 
            exit;
        }
    }
    
    
    function displayAllProducts(){
        global $dbConn;
        $sql = "SELECT * FROM table_player ORDER BY playerName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    
        foreach ($records as $record) {
            echo "<img src=".$record[playerLink]." width='75px'>";
            echo "<a class='btn btn-primary' role='button' href='updateProduct.php?playerId=".$record['playerId']."'>Update</a>";
            //echo "[<a href='deleteProduct.php?productId=".$record['playerId']."'>Delete</a>]";
            echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
            echo "   <input type='hidden' name='playerId' value='".$record['playerId']."'>";
            echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
            echo "</form>";
            
            echo "[<a 
            onclick='openModal()' target='productModal'
            href='productInfo.php? playerId=".$record['playerId']."'>".$record['playerName']."</a>]  ";
            echo " $" . $record[playerPrice]   . "<br><br>";
            
        }
    }
    
    function getCategories() {
        global $dbConn;
        $sql = "SELECT * FROM table_nation ORDER BY nationName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
        return $records;
    }
    function getLeague() {
        global $dbConn;
        $sql = "SELECT * FROM table_league ORDER BY leagueName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
        return $records;
    }
    function getClub() {
        global $dbConn;
        $sql = "SELECT * FROM table_club ORDER BY clubName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
        return $records;
    }
    
    function getProductInfo($playerId) {
         global $dbConn;
        
        $sql = "SELECT * FROM table_player WHERE playerId = $playerId";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
        
        return $record;
         
        
    }
?>