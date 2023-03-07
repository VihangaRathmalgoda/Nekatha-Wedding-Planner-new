
<?php
require "../connection.php";
$id =$_GET['p'];
$strArra =explode("_",$id);


$q="SELECT a.packageID,a.packageName FROM packagehandling as p, regiprovider as r, package as a where r.regiProviderID=p.regiProviderID and a.packageID=p.packageID and p.serviceID='$strArra[0]' and p.regiProviderID=$strArra[1]; ";

$result=mysqli_query($conp,$q);
$t="";
while($row=mysqli_fetch_assoc($result)){
    $value=$row['packageID'];
    $namehtml=$row['packageName'];
    $t.="<option value='$value'>$namehtml</option>";

}

echo $t;

?>