<?php require_once('connection.php');?>
<?php

//fill data to service combobox
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

//fill data to provider combobox
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

?>