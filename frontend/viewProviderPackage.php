<?php session_start();?>
<?php require_once('../connection.php');?>
<?php
if(isset($_SESSION['id'])){
    header('Location:ProviderLogin.php');
}
$packageID=$_GET['id'];
$packages_list='';
$query="SELECT * FROM package WHERE is_package=0 AND packageID='$packageID' ORDER BY packageName";

$package=mysqli_query($conp,$query);

//fill staff details to table

if($package){
    while($package1=mysqli_fetch_assoc($package)){

        $packages_list.="<tr>";
        // $packages_list.="<td>{$package1['packageID']}</td>";
        // $packages_list.="<td>{$package1['packageName']}</td>";
        $packages_list.="<td><div>{$package1['packageDescription']}</div></td>";
        // $packages_list.="<td>{$package1['packagePrice']}</td>";
        // $packages_list.="<td><a href=\"modilyPackage.php?id={$package1['packageID']}\"><button>View</button></a></td>";
        // $packages_list.="<td><a href=\"modilyPackage.php?id={$package1['packageID']}\"><button>Edit</button></a></td>";
        // $packages_list.="<td><a href=\"deletePackage.php?id={$package1['packageID']}\"><button>Delete</button></a></td>";
        $packages_list.="</tr>";
    }
 }
 else{
    echo "Database query failed";
 }


 //select function buttons
 
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit package</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="styleStf.css" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    
  </head>

<body>

<section class="container col-md-6">
<header>Provider details</header>

<form action="" method="POST" class="form">
       <div class="input-box">
          <h5>Description</h5>
         <label><?php echo $packages_list; ?></lable>
       </div>
       
       <a href="providerPackage.php"><button type="button"  class="btn btn-info">Back</button> </a>
</form>
</section>
</body>

</html>