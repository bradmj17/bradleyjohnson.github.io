
<head>
   <title>Catalog</title>
</head>
<?php
  if(isset($_SESSION['username'])){ 
    $user = $_SESSION['username'];
  }
  
//$name = $_POST['products'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";
//  $table = "top scores";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
//if a category is pressed it'll reload the page and show category and filter search result

include('navbar.php')
?>


<body class="col m-0 p-0 bodycss" >
        <div class="col-10 border-rounded mx-auto ">
<div class="p-2 mx-auto backgroundDiv mt-5">
    <h1>Welcome</h1>
    </div>
        <div class="p-2 mx-auto backgroundDiv">
            <p class="text-center" style="font-size: 1.4vh;">Welcome to Effigy Goods! This is a locally owned business where we resell items at a discounted price.</p>
            <p class="text-center" style="font-size: 1.4vh;">To add items to your cart, <a href="login.php" class="text-info">you must be logged in</a>.</p>
            <img src="https://www.bungie.net/common/destiny2_content/icons/ca8b8b4202b9949c0a5448204aba813b.png" class="rounded mx-auto d-block logofilter" alt="logo">
            <br/>
            <br/>
            <p class="text-right" style="font-size: 1.4vh;">Thank you for using our website. <br/>-Brad Johnson</a>.</p>
        </div>     
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

  </body>

</html>