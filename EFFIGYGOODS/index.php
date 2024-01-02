
<head>
   <title>Catalog</title>
</head>
<?php
  if(isset($_SESSION['username'])){ 
    $user = $_SESSION['username'];
  }
  $where = "reset";
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
if(isset($_POST['where'])){ 
    $where = $_POST['where'];
    if($where == "reset"){
        //idk if i need this but here we are
        unset($_SESSION['where']);
        $sql = " SELECT * FROM products ORDER BY id DESC ";
        $sql3 = " SELECT * FROM categories";
        $result = $conn->query($sql);
        $result3 = $conn->query($sql);
        $result4 = $conn->query($sql);
        $result5 = $conn->query($sql3);
    }else{
        $sql = " SELECT * FROM products WHERE category_id = $where";
        $sql3 = " SELECT * FROM categories WHERE id = $where";
        $result5 = $conn->query($sql3);
        $result = $conn->query($sql);
        $result3 = $conn->query($sql);
        $result4 = $conn->query($sql);
    }
}else{
    $sql = " SELECT * FROM products ORDER BY id DESC ";
    $result = $conn->query($sql);
    $result3 = $conn->query($sql);
    $result4 = $conn->query($sql);
    //$result5 = $conn->query($sql3);
    //$sql3 = " SELECT * FROM categories";
   // echo "pog";
}
if(!isset($sql)){ 
    $sql = " SELECT * FROM products ORDER BY id DESC ";
    
}



$sql2 = " SELECT * FROM categories ORDER BY id DESC ";
$result2 = $conn->query($sql2);
$conn->close();

include('navbar.php')
?>


<body class="col m-0 p-0 bodycss" >
    <div class="row">
        <div class="col-12">

            <div class="dropdown">
  <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="bi bi-filter"></i>Filter
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result2->fetch_assoc())
                    {
                ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    
                    <form name="category" method="post"  action="index.php" class="lessmargins">
                        <input type="hidden" name="where" value="<?php echo $rows['id']?>">
                         <button type="submit" class="btn"><?php echo $rows['name'];?></button>
                    </form>
                    <br/>

                </tr>
                <?php
                    }
                ?>
                                    <form name="category" method="post"  action="index.php">
                        <input type="hidden" name="where" value="reset">
                         <button type="submit" class="btn btn-success">reset</button>
                    </form>
                  </div>
</div>

        </div>
        <div class="col-11 border-rounded mx-auto ">
        <?php
        if(isset($_POST['where'])){ 
            if($where != "reset"){
                    // LOOP TILL END OF DATA
                    while($rows=$result5->fetch_assoc())
                    {
                ?>
                
            <h2 class="text-info">Category: <?php echo $rows['name'];?></h2>
                <?php
                    }
                }};
                ?>
<div class="row backgroundDiv p-2 mx-auto border border-info">
 
                <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result4->fetch_assoc())
                    {
                ?>
                <div class=" col-3 " id="<?php echo $rows['title'];?>">
                <img src="<?php echo $rows['image'];?>" alt="Picture of <?php echo $rows['title'];?>" class="rounded mx-auto d-block mt-3" style="width:100%;"/>
                </div>
                <div class="col-8">
                    <h2 style="font-size: 2.5vh;"><?php echo $rows['title'];?></h2>
                    <p style="font-size: 1.4vh;"><?php echo $rows['description'];?></p>
                    
                    <p>$<?php echo $rows['price'];?></p>
                    <?php
  if(isset($_SESSION['username'])){ 
    
  ?>
                    <form name="id" method="post"  action="add_cart.php">
                   <!-- <input type="hidden" name="where" value="<?php echo $POST['where']?>">-->
                    <input type="hidden" name="user" value="<?php echo $user?>">
                        <input type="hidden" name="id" value="<?php echo $rows['id']?>">
                         <button type="submit" class="btn btn-success">add to cart</button>
                         

                    </form>
<?php
  }else{

?>
                    <form name="id" method="post"  action="#<?php echo $rows['title'];?>">
                    <input type="hidden" name="user" value="<?php echo $user?>">
                        <input type="hidden" name="id" value="<?php echo $rows['id']?>">
                         <button type="submit" class="btn btn-success disabled">login to add to cart</button>

                    </form>
                    <?php
  }

?>
                </div>
                
                <?php
                    }
                ?>
                </div>
                </div>
                </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include('footer.php'); ?>

  </body>

</html>