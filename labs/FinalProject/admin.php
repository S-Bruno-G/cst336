<?php
session_start();
include 'dbConnectionFifa.php';
$dbConn = startConnection("fifa");
include 'functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        
        <style>
            form {
                display: inline-block;
            }
            #pics{
                padding-left: 500px;
                padding-right: 400px;
            }
            #bar{
                background-color: black;
                height: 100px;
                
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Really??");
                
            }
            
            function openModal() {
                
                $('#myModal').modal("show");
            }
            
            function getMax() {
                $.ajax({
                    type: "GET",
                    url: "maxAPI.php",
                    success: function(msg) {
                        alert( "Max Price: $" + msg);
                    },
	            });
            }
            
            function getAverage() {
                $.ajax({
                    type: "GET",
                    url: "averageAPI.php",
                    success: function(msg) {
                        alert( "Average Price: $" + msg);
                    },
	            });
            }
            
            function getMin() {
                $.ajax({
                    type: "GET",
                    url: "minAPI.php",
                    success: function(msg) {
                        alert( "Min Price: $" + msg);
                    },
	            });
            }
            
            $(document).ready(getMax);
            $(document).ready(getAverage);
            $(document).ready(getMin);
            
        </script>
    
    </head>
    <body>
         <!-- Bootstrap Navagation Bar -->
         <div id='bar'>
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'><b>FIFA Catalog&#174;</b></a>
                    <!--<ul class='nav navbar-nav'>-->
                        <a style="text-decorations:none; color:lightgreen; font-size:30px;" href='index.php'>Home </a>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'>|</a>
                        <a style="text-decorations:none; color:white; font-size:30px;" href='addProduct.php'>Add Player</a>
                        <a class='navbar-brand' style="text-decorations:none; color:yellow; font-size:40px;" href='#'>|</a>
                        <a style="text-decorations:none; color:#ff5d00; font-size:30px;" href='logout.php'>Logout</a>
                    </div>
                </div>
            </nav>
        </div>
            <br>
        
        <center><h1> ADMIN SECTION - FIFA Catalog&#174; </h1>
        
         <!--<h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>-->

          
          <button onClick='getMax();'>Max Price</button>
          
          <button onClick='getAverage();'>Average Price</button>
          
          <button onClick='getMin();'>Min Price</button>
          
          </center>

           <br><br>
        
       <div id='pics'><?= displayAllProducts() ?></div>
        
        
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">-->
<!--  Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Product Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="productModal" width="450" height="250"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
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