<head>
   <title>ADMIN</title>
</head>
<?php

include('navbar.php');
//removes anyone who's not logged in and probably typed the link in manually.
if(! isset($_SESSION["username"])){
    header("location:login.php");
}
//removes anyone who's not admin
if($_SESSION["username"] != "admin" && $_SESSION["username"] != "braduser"){
    header("location:index.php");
}
?>
<body>
    <div class="m-auto">
    <h1>Hello, <?php echo $_SESSION["username"] ?>! </h1>
        <h1>Here, you can see all the completed transactions</h1>
        <h1>and the grand total</h1>
        <table class="table table-bordered table-striped">
                    <thead>
                        <th>Transaction #</th>
                        <th>Item Name</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        <?php
                        $total =0;
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
                                 
                        $sql = "SELECT * FROM `transactionfinal` JOIN products ON transactionfinal.product_id = products.id";
                        $query = $con->query($sql);
                                }
                                if(mysqli_num_rows($query)!=0){
                                     
                                    
                                    while($row=$query->fetch_assoc())
                                    {

                                    ?>
                                    <tr>
                                    <td><?php echo $row['transactionid']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo number_format($row['price'], 2); ?></td>
                                        
                                  
                                    </tr>
                                    <?php
                                
                                    $total = $total + $row['price'];
                                    }
                                }
                        
                        else{
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">No Transactions available</td>
                            </tr>
                            <?php
                            }

                    ?>
                    <tr>
                        <td colspan="2" align="right"><b>Aggregate Total</b></td>
                        <td><b>$<?php echo number_format($total, 2); ?></b></td>
                    </tr>
                    <tr>
                        <?php $salestax = .06; ?>
                        <td colspan="2" align="right"><b>Sales Tax (<?php echo $salestax ?>)</b></td>
                        <td><b>$<?php echo number_format(($total*$salestax), 2); $salestaxtotal = $total*$salestax ?></b></td>
                    </tr>
                    <tr>
                        <?php $grand = $total+$salestaxtotal; ?>
                        <td colspan="2" align="right"><b>Grand Aggregate Total</b></td>
                        <td><b>$<?php echo number_format(($grand), 2); ?></b></td>
                    </tr>
                </tbody>
            </table>


</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php include('footer.php'); ?>

  </body>

</html>