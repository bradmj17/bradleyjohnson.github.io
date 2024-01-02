
<?php
//$name = $_POST['products'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";
//  $table = "top scores";
$where =  $_POST['where'];

// Create connection
$conn3 = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn3->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = " SELECT * FROM products WHERE category_id = $where";
$result3 = $conn3->query($sql);

$sql2 = " SELECT * FROM categories ORDER BY id DESC ";
$result2 = $conn3->query($sql2);

$sql3 = " SELECT * FROM categories WHERE id = $where";
$result = $conn3->query($sql3);
$conn3->close();

include('navbar.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c6c649ce01.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-4">
            <h1>categories</h1>
            <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result2->fetch_assoc())
                    {
                ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    
                    <form name="category" method="post"  action="index copy.php">
                        <input type="hidden" name="where" value="<?php echo $rows['id']?>">
                         <button type="submit" class="btn green"><?php echo $rows['id']?> <?php echo $rows['name'];?></button>
                    </form>
                    <br/>

                </tr>
                <?php
                    }
                ?>
        </div>
        <div class="col-8">
        <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result->fetch_assoc())
                    {
                ?>
                
            <h2>Category: <?php echo $rows['name'];?><a href="index.php"><i class="fa-sharp fa-solid fa-xmark-large"></i></a></h2>
                <?php
                    }
                ?>
            
        <table class="table table-dark">
    <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result3->fetch_assoc())
                    {
                ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['title'];?></td>
                    <td><?php echo $rows['description'];?></td>
                    <td><img src="<?php echo $rows['image'];?>" alt="image" class="w-100"/></td>
                    <td>$<?php echo $rows['price'];?></td>
                </tr>
                <?php
                    }
                ?>
    </table>
    
    
 
    
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

  </body>

</html>