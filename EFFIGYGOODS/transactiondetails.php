<?php
	session_start();
    $user = $_SESSION['username'];
    $con = mysqli_connect('localhost', 'root', '','project');

    // get the post records
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phonenum = $_POST['phonenum'];
    $country = $_POST['country'];
    $grandTotal = $_POST['grand'];
    $_SESSION['grandtotal'] = $grandTotal;
//gottta get username
    $sql2 = "SELECT * FROM `users` WHERE username = '$user'";
    $result = mysqli_query($con, $sql2);
//getting user id based on username
        while($row=$result->fetch_assoc())
        {
            $userid = $row['id'];
            echo $row['id'];
        $sql3 = "SELECT * from `usercart` WHERE userid = '$userid'";
        $result2 = mysqli_query($con, $sql3);
        $sql5 = "SELECT * FROM `productincart` WHERE cartid = '$userid'";
        $result5 = mysqli_query($con, $sql5);
        }
        //inserts into transdetails; uses all the posts and userid
        while($row2=$result2->fetch_assoc())
        {
            $userid = $row2['userid'];
           // echo $cartid;
        $sql4 = "INSERT INTO `transactiondetails`(`transactiondetailsid`, `userid`, `address`, `zip`, `city`, `state`, `phonenum`, `country`) VALUES ('','$userid','$address','$zipcode','$city','$state','$phonenum','$country')";
        $result3 = mysqli_query($con, $sql4);
        // grabs the same query result for its id
        $sql7 = "SELECT `transactiondetailsid`, `userid`, `address`, `zip`, `city`, `state`, `phonenum`, `country` FROM `transactiondetails` WHERE userid = '$userid' AND address = '$address' AND phonenum = '$phonenum'";
        $result7 = mysqli_query($con, $sql7);
        }
        //use the transdetailid we just created so we can do more queries with it
        while($row3=$result7->fetch_assoc())
        {
            $transactiondetailsid = $row3['transactiondetailsid'];
        }
        //now i want to add all the products in my cart into productspurchased; a more permanent cart
        while($row5=$result5->fetch_assoc())
        {
            $productincart = $row5['productid'];
        $sql6 = "INSERT INTO `productspurchased`(`productspurchasedID`, `product_id`, `cartid`) VALUES ('','$productincart', '$userid')";
        $result6 = mysqli_query($con, $sql6);
        // grabs the same query result for its id
        $sql8 = "SELECT `productspurchasedID`, `product_id`, `cartid` FROM `productspurchased` WHERE product_id = '$productincart' AND cartid = '$userid'";
        $result8 = mysqli_query($con, $sql8);
        }
        //here i send the productspurchasedid and transactiondetailsid into details, where i will be able to join three+ tables into one on the upcoming transaction table
        while($row6=$result8->fetch_assoc())
        {
            $productpurchasedID = $row6['productspurchasedID'];
        $sql6 = "INSERT INTO `transactions`(`transactionid`, `transactiondetailsid`, `productspurchasedID`) VALUES ('','$transactiondetailsid','$productpurchasedID')";
        $result6 = mysqli_query($con, $sql6);
        //setting up getting the transaction id so i can use it later
        $sql10 = "SELECT * FROM `transactions` WHERE transactiondetailsid = '$transactiondetailsid'";
        $result10 = mysqli_query($con, $sql10);
        }
        //making the transaction id a session variable, next page i'll use it. every other page needs code added to unset this so it never appears again. idk how to send data otherwise lmao
        while($row10=$result10->fetch_assoc())
        {
           // $transactionid[] =+ $row10['transactionid'];
           $transactionid = $row10['transactionid'];
             $_SESSION['transactionid'] = $transactionid;
        }
    
	header('location: transactionpage.php');
?>