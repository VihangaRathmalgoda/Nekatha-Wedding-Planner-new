<?php require_once('../connection.php');?>
<?php session_start();?>

<?php
// if(!isset($_SESSION['adminid'])){
//     header('Location:main.php');
// }
$id=$_GET['id'];
if(isset($_GET['id'])){
    //get the provider info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    
    $query="select * from regiprovider where regiProviderID='$id'and is_provider=0;";
    //echo $query;

   
    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $providername=$result['providerName'];
            $email=$result['email'];
            $location=$result['location'];
            $cnumber=$result['contactNumber'];
            // $pCategory=$result['serviceName'];
            $image=$result['images'];

          

        }
        else{
            //Not found record
            // header(('Location:viewProvider.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        // header(('Location:viewProvider.php? err=query_faild'));
    }

}



?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Top Rate Provider</title>
    <!--- CSS File--->
    <link rel="stylesheet" href="styleStf.css" />
    
  </head>

<body>
    
<section class="container">
      <header>View Provider Details</header>

<form  class="form" >
       
<div class="input-box">
          <h3>Provider Name:</h3>
          <label><?php echo $providername; ?></lable>
        </div>

        <div class="input-box">
          <h3>Email :</h3>
        <label><?php echo $email; ?></lable>

        <div class="input-box">
          <h3>Location :</h3>
        <label><?php echo $location; ?></lable>

        <div class="input-box">
          <h3>Contact NO :</h3>
        <label><?php echo $cnumber; ?></lable>

        <div>
        <img src='<?php echo "../frontend/uploads/".$image ?>'  style="width: 200px; height: 200px;"  class="img-thumbnail">
        </div>
    </div>
    
         <a href="front.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


     </form>
</body>
</html>



