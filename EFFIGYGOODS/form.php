
<head>
   <title>Create an account</title>
</head><?php
include('navbar.php');
?>
<!DOCTYPE html>
<html>


<body class="bodycss">
  <div>
    
    <div class="container backgroundDiv p-5 mt-5">
    <form name="logincode" method="post"  action="contact.php">
    <h2 style="font-size: 2.5vh;">Create an Account</h2>
  <div class="form-group mt-5">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fname" placeholder="Enter first name">
    <small id="nameText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="fname" placeholder="Enter last name">
    <small id="lnameText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="user" name="user" aria-describedby="user" placeholder="Username">
    <small id="lnameText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" aria-describedby="pass" placeholder="Password">
  </div>
  <a href="login.php">Login</a> <br/>
  <button type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include('footer.php'); ?>
</body>
</html>