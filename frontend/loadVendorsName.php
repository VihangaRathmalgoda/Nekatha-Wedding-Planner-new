
<?php
require "../connection.php";
$id =$_GET['p'];
$t="";
$sql="SELECT DISTINCT rp.regiProviderID, rp.providerName FROM packagehandling as p, regiprovider as rp, package as pc
     WHERE rp.regiProviderID=p.regiProviderID and pc.packageID=p.packageID and pc.is_package=0 and p.serviceID=$id; ";
    $result=mysqli_query($conp,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $value=$row['regiProviderID'];
        $namehtml=$row['providerName'];
        $t.="<option value='$value'>$namehtml</option>";

    }


echo $t;

?>