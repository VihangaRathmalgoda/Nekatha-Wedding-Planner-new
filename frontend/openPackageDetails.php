<?php
require_once('../connection.php');
$siD=$_GET['p'];

$query="select * from package where packageID='$siD';";

$package=mysqli_query($conp,$query);
if($package){

    if(mysqli_num_rows($package)==1){
        //found record
      
        $result1=mysqli_fetch_assoc($package);
        
        $pname=$result1['packageName'];
        $des=$result1['packageDescription'];
        $price=$result1['packagePrice'];
  
    }
    else{
        //Not found record
        // header(('Location:location.php? err=Not_found'));

    }
}
else{
    //unsuccessfull query
    // header(('Location:location.php? err=query_faild'));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>customer booking dashboard</title>
  <!-- Font -->
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- css  -->
  <link rel="stylesheet" href="css/admin.css" />
  <link rel="stylesheet" href="cusCss.css" />
 
</head> 

<body>

<div class="container my-5 py-5">

  <!--Section: Design Block-->
  <section>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <p class="text-uppercase h4 text-font text-center" style="color: #d1ac5d;">Your Booking Vendors & Packages</p>
            <div class="row">

                <!-- table -->

                <form action="" method="POST" class="staffform"> 
                <table class="table align-middle mb-0 bg-white">
                    
                <div class="input-box">
                     <h5>Package Name:</h5>
                    <label><?php echo $pname;?></lable>
                </div>
                <br/>
                <div class="input-box">
                     <h5>Description</h5>
                    <label><?php echo $des;?></lable>
                </div>
                <br/>
                <div class="input-box">
                     <h5>Price:</h5>
                    <label><?php echo $price;?></lable>
                </div>


        
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>

