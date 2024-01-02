<head>
   <title>Your Cart</title>
</head>
<?php
include('navbar.php');
if(! isset($_SESSION["username"])){
    $_SESSION["error"] = "You must be logged in to access the cart.";
    header("location:login.php");
}

?>
<body class="bodycss">
    <div class="m-auto">
        <table class="table table-bordered table-striped tablecolored mt-5">
                    <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '','project');
                            $user = $_SESSION['username'];
                            $total = 0;
                            $sql2 = "SELECT * FROM `users` WHERE username = '$user'";
                            $result = mysqli_query($con, $sql2);
                        
                                while($row3=$result->fetch_assoc())
                                {
                                    $userid = $row3['id'];
                                $sql3 = "SELECT * from `usercart` WHERE userid = '$userid'";
                                $result2 = mysqli_query($con, $sql3);
                                }
                                while($row2=$result2->fetch_assoc())
                                {
                                    $cartid = $row2['userid'];
                                 
                        $sql = "SELECT
                        *
                        FROM products
                        JOIN productincart
                          ON products.id = productincart.productid
                        JOIN usercart
                          ON productincart.cartid = $cartid AND usercart.userid = $cartid";
                        $result3 = mysqli_query($con, $sql);
                                }
                                if(mysqli_num_rows($result3)!=0){
                                      
                                    
                                    while($row=$result3->fetch_assoc())
                                    {
                                    ?>
                                    <tr>
                                        <td>
                                        <form name="category" method="post"  action="remove_cart.php">
                                                    <input type="hidden" name="cartid" value="<?php echo $cartid?>">
                                                    <input type="hidden" name="productid" value="<?php echo $row['productid']?>">
                                                    <button type="submit" class="btn btn-danger">-</button>
                                                </form>
                                                
                                        </td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                                        
                                    </tr>
                                    <?php
                                
                                    $total = $total + $row['price'];
                                    }
                                }
                        
                        else{
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">No Item in Cart</td>
                            </tr>
                            <?php
                            }

                    ?>
                    <tr>
                        <td colspan="2" align="right"><b>Total</b></td>
                        <td><b>$<?php echo number_format($total, 2); ?></b></td>
                    </tr>
                    <tr>
                        <?php $salestax = .06; ?>
                        <td colspan="2" align="right"><b>Sales Tax (<?php echo $salestax ?>)</b></td>
                        <td><b>$<?php echo number_format(($total*$salestax), 2); $salestaxtotal = $total*$salestax ?></b></td>
                    </tr>
                    <tr>
                        <?php $grand = $total+$salestaxtotal; ?>
                        <td colspan="2" align="right"><b>Grand total</b></td>
                        <td><b>$<?php echo number_format(($grand), 2); ?></b></td>
                    </tr>
                </tbody>
            </table>
            <?php
             
                    if(mysqli_num_rows($result3)!=0){
                ?>
            <div class="row m-auto float-right">
                <!--
                                        <form name="category" method="post"  action="submitorder.php" >
                                        <input type="hidden" name="cartid" value="<?php echo $cartid?>">
                                                <input type="hidden" name="productid" value="<?php echo $productid?>">
                                            <button type="submit" class="btn btn-success">Purchase<?php $index?></button>
                                        </form>
                    -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cartmodal">Purchase</button>
            </div>
            <div class="row m-auto w-100">
                                        <form name="category" method="post"  action="destroy_cart.php">
                                        <input type="hidden" name="cartid" value="<?php echo $cartid?>">
                                                <input type="hidden" name="productid" value="<?php echo $productid?>">
                                            <button type="submit" class="btn btn-danger">Clear cart</button>
                                        </form>
                    </div>
                    

<div class="modal fade cartmodal " tabindex="-1" role="dialog" aria-labelledby="cartmodal" aria-hidden="true" id="cartmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Shipping</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form name="frmContact" method="post"  action="transactiondetails.php" class="p-4">
  <div class="form-group">
    <label for="address">Shipping Address</label>
    <input type="text" class="form-control" id="address" name="address" aria-describedby="address" placeholder="Enter shipping address">
    <small id="addressText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="zipcode">Zip Code</label>
    <input type="text" class="form-control" id="zipcode" name="zipcode" aria-describedby="zipcode" placeholder="Enter zipcode">
    <small id="zipcodeText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
    <small id="cityText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state" aria-describedby="state" placeholder="Enter State">
    <small id="stateText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" class="form-control" id="country" name="country" aria-describedby="country" placeholder="Enter Country">
    <small id="countryText" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="phonenum">Phone Number</label>
    <input type="text" class="form-control" id="phonenum" name="phonenum" aria-describedby="phonenum" placeholder="Enter Phone Number">
    <small id="phonenumText" class="form-text text-muted"></small>
  </div>
  <!-- grand -->
  <input type="hidden" name="grand" id="grand" value="<?php echo $grand?>">
  <div class="modal-footer">
  <button type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
                    <?php
                
            }else{
                ?>
                                                        <form name="category" method="post"  action="index.php">
                                            <button type="submit" class="btn btn-info">Go back to Catalog</button>
                                        </form>
            <?php
            
        };
            ?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php include('footer.php'); ?>

  </body>

</html>