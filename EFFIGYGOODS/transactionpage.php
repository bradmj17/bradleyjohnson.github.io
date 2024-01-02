<head>
   <title>Your Receipt</title>
</head>
<?php

include('navbar.php');
if(! isset($_SESSION["username"])){
    header("location:login.php");
}
//$transactionid = implode(',',$_SESSION['transactionid']);
$transactionid = $_SESSION['transactionid'];
$grandTotal = $_SESSION['grandtotal'];
?>
    <body class="bodycss">
    <div class="m-auto">
        <h1>Your transaction is complete.</h1>
        <h1>TICKET: #<?php echo $transactionid ?></h1>
    
        <table class="table table-bordered table-striped tablecolored mt-5">
                    <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $con = mysqli_connect('localhost', 'root', '','project');
                            $user = $_SESSION['username'];
                            $sql2 = "SELECT * FROM `users` WHERE username = '$user'";
                            $result = mysqli_query($con, $sql2);
                        
                                while($row3=$result->fetch_assoc())
                                {
                                    $userid = $row3['id'];
                                    $email = $row3['email'];
                                    $firstname = $row3['first_name'];
                                    $lastname = $row3['last_name'];
                                $sql3 = "SELECT * from `usercart` WHERE userid = '$userid'";
                                $result2 = mysqli_query($con, $sql3);
                                }
                                while($row2=$result2->fetch_assoc())
                                {
                                    $cartid = $row2['userid'];
                                 
                        $sql = "SELECT
                        *              
                        FROM products
                        JOIN productspurchased
                          ON products.id = productspurchased.product_id
                         JOIN transactiondetails
                          ON productspurchased.cartid = transactiondetails.userid
                         JOIN transactions
                          ON transactiondetails.transactiondetailsid = transactions.transactiondetailsid
                          WHERE transactionid = $transactionid;";
                        $query = $con->query($sql);
                                }
                                if(mysqli_num_rows($query)!=0){
                                     
                                    
                                    while($row=$query->fetch_assoc())
                                    {
                                        $address = $row['address'];
                                        $city = $row['city'];
                                        $state = $row['state'];
                                        $country = $row['country'];
                                        $zipcode = $row['zip'];
                                        $phonenum = $row['phonenum'];
                                        $productid = $row['product_id'];
                                        //echo $productid;
                                        $sql52 = "INSERT INTO `transactionfinal`(`finalid`, `transactionid`, `product_id`, `grandTotal`) VALUES ('[value-1]','$transactionid','$productid', '$grandTotal')";
                                        $result52 = $con->query($sql52);
                                    ?>
                                    <tr>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo number_format($row['price'], 2); ?></td>
                                        
                                        <td><?php echo number_format($row['price'], 2); ?></td>
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
<div class="mx-auto">
    <h1>TRANSACTION INFORMATION:</h1>
<p class="text-center"> <?php echo $lastname ?>, <?php echo $firstname ?></p>
<p class="text-center"> USER ID: #<?php echo $userid ?></p>
<p class="text-center"> Email: <?php echo $email ?></p>
<p class="text-center"> Phone: <?php echo $phonenum ?></p>
    <p class="text-center"> <?php echo $address ?>, <?php echo $city ?>, <?php echo $state ?>, <?php echo $zipcode ?>, <?php echo $country ?></p>
</div>
<div class="row m-auto float-right">
                                        <form name="category" method="post"  action="resetcart.php" >
                                        <input type="hidden" name="cartid" value="<?php echo $cartid?>">
                                            <button type="submit" class="btn btn-success">Proceed</button>
                                        </form>
            </div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php include('footer.php'); ?>

  </body>

</html>