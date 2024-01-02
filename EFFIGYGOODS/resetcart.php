<?php
session_start();
//main difference from remove cart is transactionid is unset line4
		
$user = $_SESSION['username'];
$con = mysqli_connect('localhost', 'root', '','project');

// get the post records
$cartid = $_POST['cartid'];
echo $cartid;
$sql5 = "DELETE FROM `productspurchased` WHERE cartid = $cartid";
$result5 = mysqli_query($con, $sql5);
	$sql4 = "DELETE FROM `productincart` WHERE cartid = $cartid";
	$result3 = mysqli_query($con, $sql4);

    unset($_SESSION['transactionid']);
	unset($_SESSION['grandTotal']);
header('location: index.php');
?>