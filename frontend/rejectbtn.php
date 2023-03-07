<?php session_start();?>
<?php require_once('../connection.php');?>
<?php
 $pID=$_SESSION['regiProviderID'];
$sName=$_SESSION['providerName'];

if(isset($_GET['id'])){
    //get the service info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    $query="update bookingprice set status=3 WHERE bookingID={$id} and regiProviderID= {$pID}  LIMIT 1";
    //echo $query;
}
 
 $jobs=mysqli_query($conp,$query);

 //fill inquiry details to table

 if($jobs){
    
    echo "<script><alert>Rejected Booking</alert></script>";
    header(('Location:rejectjobs.php'));
    
     }
  
  else{
     echo "Database query failed";
  }
 
 
?>

