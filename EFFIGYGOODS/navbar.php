<?php
session_start();
   // $username = $_SESSION['username'];
    //$IsLogged = $_SESSION['loggedIn'];
    //echo "<p>$IsLogged<p>";
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

     <!-- Bootstrap Font Icon CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <!-- <title>SinkStar</title>-->
</head>
<?php
    if(isset($_SESSION['error'])){
		?>
<div class="bg-warning m-0">
<p class="p-1"><?php echo $_SESSION['error']?></p>
</div>
<?php
	}

?>
<nav class="navbar navbar-expand-lg navbar-light p-4 m-0">
  <a class="navbar-brand" href="home.php"><img src="https://www.bungie.net/common/destiny2_content/icons/ca8b8b4202b9949c0a5448204aba813b.png" class="rounded mr-2 w-25" alt="logo"> Effigy Goods</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Catalog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="bi bi-cart"></i> Cart</a>
      </li>
    </ul>
    <?php
    if(isset($_SESSION['username'])){ 
    if($_SESSION["username"] == "admin" || $_SESSION["username"] == "braduser"){
        ?><p class="mr-5">
<a href="admin.php">
        <button type="button" class="btn btn-outline-warning">
          OPEN ADMIN
        </button></a></p>
        <?php
    }}
    //determines if user is logged in by checking session variable. will show login option if not, otherwise will show username and option to logout
    if(isset($_SESSION['username'])){ 
        ?>
        <p>Logged in as <?php echo $_SESSION['username']; ?><a href="logout.php">
        <button type="button" class="btn btn-outline-warning">
          logout
        </button></a></p>
    <?php }else{?>
        <a href="login.php">
        <button type="button" class="btn btn-outline-info">
          login
        </button>
  </a>

        <?php };?>
    <?php
    /*
    if($IsLogged = true){
        echo "Logged in as $username";
        echo"<a href=\"logout.php\">
        <button type=\"button\" class=\"btn btn-outline-warning\">
          logout
        </button>
  </a>";

    }
    if ($IsLogged = false || $IsLogged = null){
        echo"<a href=\"form.php\">
        <button type=\"button\" class=\"btn btn-outline-info\">
          login
        </button>
  </a>";
};

    */?>

  </div>
</nav>