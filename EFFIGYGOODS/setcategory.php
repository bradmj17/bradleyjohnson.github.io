<?php
session_start();

$where = $_POST['where'];
if($where == "reset"){
    session_unset($_SESSION['where']);
}else{
    $_SESSION['where'] =  $where;
}
/*
$_SESSION['username'] = "placeholder";
$_SESSION['loggedIn'] = false;
*/
  header("Location: index.php");
  ?>