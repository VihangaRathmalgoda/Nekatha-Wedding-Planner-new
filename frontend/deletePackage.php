<?php

use LDAP\Result;

 session_start();?>
<?php require_once('../connection.php');?>

<?php

        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the package info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    $query="UPDATE package SET is_package=1 WHERE packageID={$id} LIMIT 1";
    $result=mysqli_query($conp,$query);

    if($result){
        //Record was deleted
        header('Location:providerPackage.php? member_deleted');
    }
    else{
        header('Location:providerPackage.php? Not_deleted');

    }

}
else{
    header('Location:providerPackage.php');
}

if(isset($_POST['submit'])){
          
            
    $req_fields=array('packagename','packagedescrip','price');

        foreach($req_fields as $field){

        if(empty(trim($_POST[$field]))){
            $errors[]=$field.' is Required'.'</br>';
        }
    

    }

 

}
?>

