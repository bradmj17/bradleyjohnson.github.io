<?php
	session_start();
    //$_SESSION['cart'] = [];
	//check if product is already in the cart
	//if(!in_array($_POST['id'], $_SESSION['cart'])){

	//	array_push($_SESSION['cart'], array($_POST['id']));
 
   // array_push($_SESSION['cart'], $_POST['id']);
    //}
    $user = $_SESSION['username'];
    $con = mysqli_connect('localhost', 'root', '','project');
  
    // get the post records
    $productadded = $_POST['id'];
    
    echo $productadded;
    $sql2 = "SELECT * FROM `users` WHERE username = '$user'";
    $result = mysqli_query($con, $sql2);

        while($row=$result->fetch_assoc())
        {
            $userid = $row['id'];
            echo $row['id'];
        $sql3 = "SELECT * from `usercart` WHERE userid = '$userid'";
        $result2 = mysqli_query($con, $sql3);
        }
        while($row2=$result2->fetch_assoc())
        {
            $cartid = $row2['userid'];
            echo $cartid;
        $sql4 = "INSERT INTO `productincart`(`productInCartID`, `productid`, `cartid`) VALUES ('','$productadded','$cartid')";
        $result3 = mysqli_query($con, $sql4);
        }
    
	header('location: index.php');
?>