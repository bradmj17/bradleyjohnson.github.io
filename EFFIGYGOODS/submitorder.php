<?php
session_start();
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','project');
$sql = "INSERT INTO `userCart` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `join_date`) VALUES ('0', '$fname', '$lname', '$email', '$user','$pass','$date')";
$sql2 = "INSERT INTO `transactions` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `join_date`) VALUES ('0', '$fname', '$lname', '$email', '$user','$pass','$date')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
    $_SESSION['username'] = $user;
    $_SESSION['loggedIn'] = true;
    header("Location: cart.php");
}else{
    header("Location: cart.php");
}


?>