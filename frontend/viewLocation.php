<?php require_once('../connection.php');?>
<?php session_start();?>

<?php
//if(!isset($_SESSION['adminid'])){
  //  header('Location:main.php');
//}
$locationName="";
$locationDescription="";
if(isset($_GET['placeID'])){
    
    
    
    $id=mysqli_real_escape_string($conp,($_GET['placeID']));
//get the location info
    $query="select * from place WHERE placeID='$id' ";
    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $locationName=$result['name'];
            $locationDescription=$result['description'];
            $image =$result['images'];

        }
        else{
            //Not found record
            header(('Location:location.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:location.php? err=query_faild'));
    }

}



?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>staff add form</title>
    <!---CSS File--->
    <link rel="stylesheet" href="styleStf.css" />
    
  </head>

<body>
    
<section class="container">
      <header>View Location</header>

   
<!-- location view -->

<form  class="form" >
       
<div class="input-box">
          <h3>Location name:</h3>
          <label><?php echo $locationName; ?></lable>
        </div>

        <div class="input-box">
          <h3>Details</h3>
          <img src='<?php echo "uploads/".$image ?>' style="width: 200px; height: 200px;"  class="img-thumbnail">
</div>
      <a href="Location.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>
     </form>
</body>
</html>



