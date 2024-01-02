
<head>
   <title>Login</title>
</head>
<?php
include('navbar.php');
unset($_SESSION['error']);
?>



<body class="bodycss">
  <div>
    
    <div class="container backgroundDiv p-5 mt-5">
    <form name="logincode" method="post"  action="logincode.php">
    <h2 style="font-size: 2.5vh;">Login</h2>
  <div class="form-group mt-5">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="user" name="user" aria-describedby="user" placeholder="Username">
    <small id="lnameText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" aria-describedby="pass" placeholder="Password">
  </div>
<a href="form.php">Create an account</a>
<br/>
  <button type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>