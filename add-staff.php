<?php session_start();?>
<?php require_once('connection.php');?>

<?php

if(!isset($_SESSION['adminid'])){
  header('Location:main.php');
}

        $errors=array();
        if(isset($_POST['submit'])){

 //preview required feild
            $req_fields=array('staffname','staffpassword','staffemail');

                foreach($req_fields as $field){

                if(empty(trim($_POST[$field]))){
                    $errors[]=$field.' is Required'.'</br>';
                }
            

            }
//check database
            $staffname=mysqli_real_escape_string($conp,$_POST['staffname']);
            $query="SELECT * FROM staff WHERE staffName='{$staffname}' LIMIT 1";

            $result_set=mysqli_query($conp,$query);
            if($result_set){
                if(mysqli_num_rows($result_set)==1){

                    $errors[]=  '<div class="alert alert-danger" role="alert">
                    User Name already Exists !
                  </div>';
                }
            }
//chek required feild
            if(empty($errors)){

                $staffname=mysqli_real_escape_string($conp,$_POST['staffname']);
                $staffemail=mysqli_real_escape_string($conp,$_POST['staffemail']);
                $staffpassword=mysqli_real_escape_string($conp,$_POST['staffpassword']);

                $hashed_password=sha1($staffpassword);
//SQL Insert query
                $query="INSERT INTO staff (";
                $query.="staffName,staffPassword,staffEmail,is_staffmember_delete";
                $query.=")VALUES(";
                $query.="'$staffname','$hashed_password','$staffemail',0";	
                $query.=")";

                $result=mysqli_query($conp,$query);
                if($result){

                    header('Location:staffdashboard.php?staff_added=true');

                }
                else{
                    $errors[]='<div class="alert alert-danger" role="alert">
                    Record was not saved !
                  </div>';
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
      
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
  <link rel="stylesheet" href="cusCss.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
    <link rel="stylesheet" href="styleStf.css" />
    
  </head>
  <body>
    <section class="container">
      <header>Add new member</header>

<!-- preview form error -->
      <?php
            if(!empty($errors)){
                echo '<div class="errmsg">';
                echo '<div class="alert alert-danger" role="alert">
                There were errors on your form !
              </div>';
               
                
                foreach($errors as $error){
                    echo $error.'</br>';
                }
                echo '</div>';
                
            }
        ?>


      <form action="add-staff.php" method="POST" class="form" class="staffform">
       
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" name="staffname" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="email" placeholder="Enter email address" name="staffemail"   required/>
        </div>

        <div class="input-box">
          <label>Password</label>
          <input type="Password" placeholder="Enter Password" name="staffpassword" maxlength="8" minlength="6" required />
        </div>

      <!-- form submit button -->
        <button class='btn btn-info btn-sm' name="submit" >Save</button>
       
        <!--back button -->
       <a href="staffdashboard.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


      </form>
    </section>
  </body>
</html>