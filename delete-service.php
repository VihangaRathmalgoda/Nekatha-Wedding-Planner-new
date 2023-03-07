<?php

use LDAP\Result;

 session_start();?>
<?php require_once('connection.php');?>

<?php
        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the service info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    $query="UPDATE service SET is_service=1 WHERE serviceID={$id} LIMIT 1";
    $result=mysqli_query($conp,$query);

    if($result){
        //Record was deleted
        header('Location:servicesdashboard.php? member_deleted');
    }
    else{
        header('Location:servicesdashboard.php? Not_deleted');

    }

}
else{
    header('Location:servicesdashboard.php');
}

?>

