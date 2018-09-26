<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("cssc/styles.css");
        </style>
        
        <title> Fifa Card </title>
    </head>
    <body>
        <!--<center><img src = "fifaCard.png" alt = "fifa card" title = "fifa logo" width = "25%"/></center>-->
        <div id="main">
            <?php include 'functions.php';
                image(0);
            ?>
            
            <!--<form>-->
                <!--<input type="submit" name="Spin!"/>-->
            <!--</form>-->
        </div>
        <table>
            
                <tr id = "tableHeader">
                    <!--<td><strong>Programming Language</strong></td>-->
                    <!--<td><strong>Years Experience</strong></td>-->
                </tr>
                
                <tr class = "table-row">
                    <td><?php
                            echo rand(1,99);
                        ?>
                    </td>
                    <td><?php
                            echo rand(1,99);
                        ?>
                    </td>
                </tr>
                
                <tr class = "table-row">
                    <td><?php
                            echo rand(1,99);
                        ?>
                    </td>
                    <td><?php
                            echo rand(1,99);
                        ?>
                    </td>
                </tr>
                
                <tr class = "table-row">
                    <td><?php
                            echo rand(1,99);
                        ?>
                    </td>
                    <td><?php
                            echo rand(1,99);
                        ?>
                    </td>
                </tr>
            </table>
    </body>
    <br>
    <br>
    <br>
    <br>
    <footer>
        CST336 Internet Programming. 2018
        &copy; 2018 Santiago Bruno<br />
        <strong> Disclaimer: </strong> The information in this website is fictitous. It's used for academic purposes only.
        <br />
        <img src = "csumb_logo.jpg" alt = "CSUMB logo" title = "This is the CSUMB logo" width = "50px" />
        <img src = "buddy.png" alt = "Buddy verification logo" title = "This is the Buddy verification logo" width = "50px" />
    </footer>
</html>
