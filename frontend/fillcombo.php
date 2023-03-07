<?php require_once('../connection.php');?>
<?php
function passComboValue(){

    global $conp;
    try{
    $sql="SELECT serviceID,serviceName FROM service WHERE is_service=0";
    $result=mysqli_query($conp,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $value=$row['serviceID'];
        $namehtml=$row['serviceName'];
        echo "<option value='$value'>$namehtml</option>";

    }

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

function passComboValueregi(){

    global $conp;
    try{
    $sql="SELECT regiProviderID,providerName FROM regiprovider";
    $result=mysqli_query($conp,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $value=$row['regiProviderID'];
        $namehtml=$row['providerName'];
        echo "<option value='$value'>$namehtml</option>";

    }

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
function passComboValueVenue(){

    global $conp;
    try{
    $sql="SELECT placeID,name FROM place WHERE is_place=1";
    $result=mysqli_query($conp,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $value=$row['placeID'];
        $namehtml=$row['name'];
        echo "<option value='$value'>$namehtml</option>";

    }

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
function passComboValuePackage(){

    global $conp;
    try{
    $sql="SELECT packageID ,packageName FROM package";
    $result=mysqli_query($conp,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $value=$row['packageID'];
        $namehtml=$row['packageName'];
        echo "<option value='$value'>$namehtml</option>";

    }

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

function passComboValueVendors($id){

    global $conp;
    try{
    $sql="SELECT DISTINCT rp.regiProviderID, rp.providerName FROM packagehandling as p, regiprovider as rp, package as pc
     WHERE rp.regiProviderID=p.regiProviderID and pc.packageID=p.packageID and pc.is_package=0 and p.serviceID=$id; ";
    $result=mysqli_query($conp,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $value=$row['regiProviderID'];
        $namehtml=$row['providerName'];
        echo "<option value='$value'>$namehtml</option>";

    }

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>