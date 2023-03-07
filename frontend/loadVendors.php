<?php
require "../connection.php";
$id =$_GET['p'];
$q="SELECT packagePrice FROM package WHERE packageID=$id; ";

$result=mysqli_query($conp,$q);
$row=mysqli_fetch_assoc($result);

echo $row['packagePrice'] ;

?>