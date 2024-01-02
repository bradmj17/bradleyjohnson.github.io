<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','project');


$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user != "" && $pass != ""){
    $sql = "SELECT COUNT(*)
    FROM users
    WHERE username = '$user' and password = '$pass'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $count = $row;

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $user;
       // header('Location: index.php');
        if (password_verify( $_POST['pass'], $user->password)){
            $_SESSION['username'] = $user;
        }
        header("Location: index.php");
    }else{
        header("Location: login.php");
    }
}

?>