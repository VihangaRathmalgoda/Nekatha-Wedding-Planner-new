<?php session_start();?>
<?php require_once('../connection.php');?>
<?php
// if(isset($_SESSION['customerID'])){
//     header('Location:login.php');
//}
$sname=$_SESSION['customerUserName'];
$sid=$_SESSION['customerID'];
$providerIDAr=array();

$rate_list='';
//$pID=$_SESSION['regiProviderID'];

// $query="select c.,p.* from package as p,packagehandling as h,service as s WHERE p.packageID=h.packageID ANd s.serviceID=h.serviceID AND is_package=0 and h.regiProviderID ='$pID'";
$query="select p.regiProviderID, p.providerName, s.serviceName from bookingprice as bp, booking as b, regiprovider as p, service as s 
where bp.bookingID=b.bookingID and p.regiProviderID=bp.regiProviderID and s.serviceID=bp.serviceID and b.customerID='$sid';";
// echo $query;
$rate=mysqli_query($conp,$query);

//fill staff details to table

if($rate){
    while($rate1=mysqli_fetch_assoc($rate)){
     

        $providerId=$rate1['regiProviderID'];
        array_push($providerIDAr,$providerId);
        $rate_list.="<tr>";
        $rate_list.="<td>{$rate1['providerName']}</td>";
        $rate_list.="<td>{$rate1['serviceName']}</td>";
        $rate_list.="<td><input type='number' min='0' max='5'  class='form-control' name='rate_$providerId' id='rate' placeholder='Enter the rate' required/></td>";
       // $rate_list.="<td><button>Rate</button></td>";
        $rate_list.="</tr>";
    }
 }
 else{
    echo "Database query failed";
 }


 //select function buttons
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
  <link rel="stylesheet" href="cusCss.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Rating</title>
  </head>
  <body>
  

  <div class="mx-0 mx-sm-auto">
  <div class="card">
    <div class="card-body">
      <div class="text-center">
        <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
        <p>
          <strong>Your opinion matters</strong>
        </p>
        <p>
          Have some ideas how to improve our product?
          <strong>Give us your feedback.</strong>
        </p>
      </div>
      <form action="" method="POST" >
        <table  class="table table-sm">
            <tr>
                <th style="color: #d1ac5d;">Vendor</th>
                <!-- <th>Customer</th> -->
                <th style="color: #d1ac5d;">Service Name</th>
                <th style="color: #d1ac5d;">Rate</th>
            </tr>

            <?php echo $rate_list; ?>
        </table>
    </div>
    <div class="card-footer text-center ">
      <button type="submit" name="Rate" class="btn btn-warning btn-rounded float-end button-color "   style="background-color: #d1ac5d;" data-mdb-ripple-color="dark" >Rate Services</button>
    </div>
    
  </div>
</div>

</body>
</html>


<?php

if(isset($_POST['Rate'])){
    try{
       
        foreach($providerIDAr as $data){
                $rateValue=$_POST["rate_".$data];   
                $query="update providerrate set rate='$rateValue' where customerID='$sid' and providerID='$data'";
                mysqli_query($conp,$query);
        }       
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

?>