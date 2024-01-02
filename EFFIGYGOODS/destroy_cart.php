<?php
	session_start();

		//unset($_SESSION['cart']);
		
		$user = $_SESSION['username'];
		$con = mysqli_connect('localhost', 'root', '','project');
		
		// get the post records
		$cartid = $_POST['cartid'];
		$productid = $_POST['productid'];
		echo $cartid;
		
			$sql4 = "DELETE FROM `productincart` WHERE cartid = $cartid";
			$result3 = mysqli_query($con, $sql4);
			
		
		header('location: cart.php');
 
	
?>