<?php
require "connection.php";
$id =$_GET['p'];
$strArra =explode("_",$id);


try{

        $sql="update booking set is_booking=2 where bookingID=$strArra[1]";
        mysqli_query($conp,$sql);

       $sql="insert into canclation (BookinID, staffID) values($strArra[1],$strArra[0])";
       mysqli_query($conp,$sql);
  

}catch(Exception $e){
    echo $e->getMessage();
}



echo $id;

?>