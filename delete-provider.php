<?php

use LDAP\Result;

 session_start();?>
<?php require_once('connection.php');?>

<?php
        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the provider info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    $query="UPDATE regiprovider SET is_provider=1 WHERE regiProviderID={$id} LIMIT 1";
    $result=mysqli_query($conp,$query);

    if($result){
        //Record was deleted
        header('Location:providersdashboard.php? member_deleted');
    }
    else{
        header('Location:providersdashboard.php? Not_deleted');

    }

}
else{
    header('Location:providersdashboard.php');
}

?>

