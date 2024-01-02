<?php
session_start();
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','project');

// get the post records
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$date = date("Y.m.d");

// database insert SQL code
$sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `join_date`) VALUES ('0', '$fname', '$lname', '$email', '$user','$pass','$date')";

// insert in database 
$rs = mysqli_query($con, $sql);

$sql2 = "SELECT id FROM `users` WHERE username = '$user'";
$result = mysqli_query($con, $sql2);

if($rs)
{
	echo "Contact Records Inserted";
    $_SESSION['username'] = $user;
    $_SESSION['loggedIn'] = true;

    while($row=$result->fetch_assoc())
    {
        $id = $row['id'];
    $sql2 = "INSERT INTO `usercart`(`cartid`, `userid`) VALUES ('[value-1]','$id')";
    $rs2 = mysqli_query($con, $sql2);
    }
    header("Location: index.php");
}else{
    header("Location: form.php");
}


?>