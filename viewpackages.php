<?php require_once('connection.php');?>
<?php session_start();?>

<?php
// if(!isset($_SESSION['adminid'])){
//     header('Location:main.php');
// }
if(isset($_GET['id'])){
    //get the provider info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
 
//SQL get package data
    $query="select * from service as s, regiprovider as r,packagehandling as p left join package as pc on p.packageID=pc.packageID 
    where p.serviceID=s.serviceID and p.regiProviderID = r.regiProviderID and p.packageID='$id';";
    $result_set=mysqli_query($conp,$query);
    
    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $providername=$result['providerName'];
            $category=$result['serviceName'];
            $packagename=$result['packageName'];
            $pdiscription=$result['packageDescription'];
            $pprice=$result['packagePrice'];

        }
        else{
            //Not found record
             header(('Location:viewProvider.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
         header(('Location:viewProvider.php? err=query_faild'));
    }

}
?>



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
      <header>View Packages</header>

   



<form  class="form" >
       
<div class="input-box">
          <h3>Provider Name:</h3>
          <label><?php echo $providername; ?></lable>
        </div>

        <div class="input-box">
          <h3>Category :</h3>
        <label><?php echo $category; ?></lable>

        <div class="input-box">
          <h3>Package :</h3>
        <label><?php echo $packagename; ?></lable>

        <div class="input-box">
          <h3>Description :</h3>
        <label><?php echo $pdiscription; ?></lable>

        <div class="input-box">
          <h3>Price :</h3>
        <label><?php echo $pprice; ?></lable>
</div>

     
      
      <a href="packagesdashboard.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


     </form>
</body>
</html>



