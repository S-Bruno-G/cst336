<?php
    include 'loginProcess.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
    </head>
    <body>

        <h1>Ottermart - Admin Login</h1>
        
        <script type="text/javascript">
            function error() {
                alert("Invalid username/password");
            }
        </script>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" name="login" value="Login">
        </form>
        <?php
            if($_POST['login'] == "Login") {
                if(!login()) {
                    echo "<script>error()</script>";
                }
            }
          ?>
    </body>
</html>