<?php require_once('connection.php');?>
<?php session_start();?>

<?php
//if(!isset($_SESSION['adminid'])){
  //  header('Location:main.php');
//}
if(isset($_GET['id'])){
    //get the provider info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));

    //SQL get service details
    $query="select * from service where serviceID='$id';";
    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $servicename=$result['serviceName'];
            $description=$result['serviceDescription'];
        }
        else{
            //Not found record
            header(('Location:servicedashboard.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:servicedashboard.php? err=query_faild'));
    }

}



?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>view service</title>
    <!--CSS File--->
    <link rel="stylesheet" href="styleStf.css" />
  </head>

<body>
    
<section class="container">
      <header>View Details</header>

   

    <main>
      
<!-- view error message -->
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

<form  class="form" >
       
<div class="input-box">
          <h3>Service:</h3>
          <label><?php echo $servicename; ?></lable>
        </div>

        <div class="input-box">
          <h3>Details</h3>
        <label><?php echo $description; ?></lable>
</div>

      <a href="servicesdashboard.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


     </form>
</main>
</body>
</html>



