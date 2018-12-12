<?php
session_start();
include 'dbConnectionFifa.php';
$dbConn = startConnection("fifa");
    function login() {
        global $dbConn;
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        
        //This SQL does NOT prevent SQL Injection (because of the single quotes)
        // $sql = "SELECT * FROM om_admin
        //                  WHERE username = '$username' 
        //                  AND  password = '$password'";
                         
        $sql = "SELECT * FROM om_admin
                         WHERE username = :username 
                         AND  password = :password ";                 
        $np = array();
        $np[':username'] = $username;
        $np[':password'] = $password;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
        
        //print_r($record);
        
        if (empty($record)) {
            return false;
        } else {
           $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
           header('Location: admin.php'); //redirects to another program
           return true;
        }
    }
?>
        
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <style>
            form {
                display: inline-block;
            }
            #login{
                background-color: limegreen;
            }
            #login:hover{
                background-color: lightgreen;
            }
            #bar{
                background-color: black;
                height: 100px;
                text-align: left;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    
    <center><body>
        <!-- Bootstrap Navagation Bar -->
        <div id='bar'>
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'><b>FIFA Catalog&#174;</b></a>
                    <!--<ul class='nav navbar-nav'>-->
                    
                        <a style="text-decorations:none; color:lightgreen; font-size:30px;" href='index.php'>Home </a>
                        <!--<a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'>|</a>-->
                        <!--<a style="text-decorations:none; color:white; font-size:30px;" href='login.php'>Login</a>-->
                    </div>
                </div>
            </nav>
        </div>
            <br>

        <h1>FIFA Catalog&#174; - Admin Login</h1>
        
        <script type="text/javascript">
            function error() {
                alert("Invalid username/password");
            }
        </script>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br><br>
          Password:  <input type="password" name="password"/> <br><br>
          <input type="submit" name="login" id='login' value="Login">
        </form>
        <?php
            if($_POST['login'] == "Login") {
                if(!login()) {
                    echo "<script>error()</script>";
                }
            }
          ?>
    </body>
    <hr id='bottom' width='100%' size='10px' color='#a6a6a6'>
    <center><footer>
		CST336 Internet Programming. 2018
        &copy; 2018 Santiago Bruno<br />
        <strong> Disclaimer: </strong> The information in this website is fictitous. It's used for academic purposes only.
        <br />
        <img src = "img/csumb_logo.jpg" alt = "CSUMB logo" title = "This is the CSUMB logo" width = "50px" />
        <img src = "img/buddy.png" alt = "Buddy verification logo" title = "This is the Buddy verification logo" width = "50px" />
    </footer></center>
</html>