<?php

$connection = mysqli_connect("localhost:3306","root","","project");
if(!$connection){
    die("Error". mysqli_connect_error());
}
else

$query = "select * from products";

$statement = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($statement, MYSQLI_ASSOC)){
    echo $row['id'] . ' ' . $row['title'] . ' ' . $row['description'] . '<br/>';
}
?>
<table>
    
</table>