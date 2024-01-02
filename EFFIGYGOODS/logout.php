<?php
//straight up deletes pretty much everything. so far it doesnt break anything else but it may change.
session_start();
session_destroy();
/*
$_SESSION['username'] = "placeholder";
$_SESSION['loggedIn'] = false;
*/
  header("Location: index.php");
  ?>