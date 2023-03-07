<?php session_start();?>
<?php require_once('connection.php');?>

<?php
if(!isset($_SESSION['adminid'])){
    header('Location:main.php');
}
        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the user info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    //SQL select query
    $query="SELECT * FROM staff WHERE staffID={$id} LIMIT 1";
    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $staffname=$result['staffName'];
            $staffpassword=$result['staffPassword'];
            $staffemail=$result['staffEmail'];

        }
        else{
            //Not found record
            header(('Location:admindashboard.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:admindashboard.php? err=query_faild'));
    }

}

if(isset($_POST['submit'])){
          
        //view reqired feild error message print
    $req_fields=array('staffname','staffemail');

        foreach($req_fields as $field){

        if(empty(trim($_POST[$field]))){
            $errors[]=$field.' is Required'.'</br>';
        }
    

    }

    if(empty($errors)){

        
        $staffname=mysqli_real_escape_string($conp,$_POST['staffname']);
        $staffemail=mysqli_real_escape_string($conp,$_POST['staffemail']);
       $idno =mysqli_real_escape_string($conp,$_POST['id']);
      
    //update staff details
       $query = "update staff set staffName ='$staffname', staffEmail='$staffemail' where staffID='$idno' ";
       echo $query;

        $result=mysqli_query($conp,$query);
        if($result){

            header('Location:staffdashboard.php?staff_modify=true');

        }
        else{
            $errors[]='Recored was Not Modified';swal("Good job!", "You clicked the button!", "success");
        }
    }
}
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>staff add form</title>
    <!--- CSS File--->
    <link rel="stylesheet" href="styleStf.css" /> 
  </head>

<body>
    
<section class="container">
      <header>View Details</header>
    <main>
      
    <!-- preview form error message -->
        <?php
            if(!empty($errors)){
                echo '<div class="errmsg">';
                echo '<b>There were error(s) on your form.</b>.</br>';
               
                
                foreach($errors as $error){
                    echo $error.'</br>';
                }
                echo '</div>';
                
            }
        ?>

<form action="modify-admindashboard.php" method="POST" class="form" class="staffform">
       
       <div class="input-box">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
         <label>Name:</label>
         <input type="text" name="staffname"  value="<?php echo $staffname; ?>" />
       </div>

       <div class="input-box">
         <label>Email:</label>
         <input type="email"  name="staffemail"  value="<?php echo $staffemail; ?>" />
       </div>

       <div class="input-box">
         <label>Password:</label>
         <span>********</span> | <a href="change-password.php?id=<?php echo $id;?>"> Change Password?</a>
       </div>

     
       <button class='btn btn-info btn-sm' name="submit" >Save</button>
      
      <a href="staffdashboard.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


     </form>
</main>
</body>
</html>