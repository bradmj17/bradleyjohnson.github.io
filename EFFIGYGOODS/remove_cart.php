<?php
	//session_start();
/*
echo 'im removing '.$_POST['id'].' ';
echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
$_SESSION['cart'] = array_values($_SESSION['cart']);
	unset($_SESSION['cart'][$_POST['id']]);
	echo 'after';
	$_SESSION['cart'] = array_values($_SESSION['cart']);
	echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
*/

session_start();
$user = $_SESSION['username'];
$con = mysqli_connect('localhost', 'root', '','project');

// get the post records
$cartid = $_POST['cartid'];
$productid = $_POST['productid'];
echo $cartid;

	$sql4 = "DELETE FROM `productincart` WHERE productid = $productid and cartid = $cartid";
	$result3 = mysqli_query($con, $sql4);
	

header('location: cart.php');
	//header('location: cart.php');
?>