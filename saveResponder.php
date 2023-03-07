<?php
require "connection.php";
$id =$_GET['p'];
$strArra =explode("_",$id);


try{
    //update query
    $q="update inquiry set responceStaffID=$strArra[0] where inquaryID=$strArra[1]";

    mysqli_query($conp,$q);
}catch(Exception $e){
    echo $e->getMessage();
}

echo $strArra[1];

?>