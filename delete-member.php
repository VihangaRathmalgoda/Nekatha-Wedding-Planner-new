<?php

use LDAP\Result;

 session_start();?>
<?php require_once('connection.php');?>

<?php

        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the user info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));

    //update staff status
    $query="UPDATE staff SET is_staffmember_delete=1 WHERE staffID={$id} LIMIT 1";
    $result=mysqli_query($conp,$query);

    if($result){
        //Record was deleted
        header('Location:staffdashboard.php? member_deleted');
    }
    else{
        header('Location:admindashboard.php? Not_deleted');

    }

}
else{
    header('Location:admindashboard.php');
}

?>

