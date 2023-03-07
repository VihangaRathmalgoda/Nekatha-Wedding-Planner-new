<?php session_start();?>
<?php require_once('../connection.php');
require_once "fillcombo.php";
$customerDetailsArray=$_SESSION['CDetails'];
?>

<?php
if(!isset($_SESSION['customerID'])){
  header('Location:front.php');
}

$serviceIDArr=array();
$sid=$_SESSION['customerID'];

//get customer details
$customer_details='';
$query="SELECT * FROM customer WHERE customerID='$sid'";

$customer=mysqli_query($conp,$query);

//fill customer details to table
if($customer){
 
    $customer1=mysqli_fetch_assoc($customer);
   
 }
 else{
    echo "Database query failed";
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</head> 

<body>

<!-- nav bar -->
<header>

<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">


        <!-- Brand -->
        <div class="sidebar-heading text-center py-2 primary-text fs-4 fw-bold text-uppercase border-bottom" style="color:#FF577F"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 20">
            <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
            </svg></i></i>Nekatha</div>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2" ></i>Hi, <?php echo $customer1['customerUserName'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="clustomerLogout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
            </div>
      </div>
      <!-- Container wrapper -->
    </nav>
</header>
<!-- nav bar -->






<div class="container my-5 py-5">

  <!--Section: Design Block-->
  <section>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <p class="text-uppercase h4 text-font text-center" style="color: #d1ac5d;">Booking Vendors & Packages</p>
            <div class="row">
              <

                <!-- table -->
<form action="" method="POST" class="staffform"> 
<table class="table align-middle mb-0 bg-white">
<thead class="bg-light">
    <tr>
      <th class="fw-bold mb-1">Sevice</th>
      <th class="fw-bold mb-1">Vendor</th>
      <th class="fw-bold mb-1">Package</th>
      <th class="fw-bold mb-1">Price</th>
      <th></th>
    </tr>
  </thead>

   <tbody id="data">

            <?php
             $sql="select serviceID,serviceName from service where is_service=0";
             $rs=mysqli_query($conp,$sql);
             while($row=mysqli_fetch_assoc($rs)){ ?>
                <tr>
                    <td><?php echo $row['serviceName']; ?></td>

                  
                    <td> <select name="vendors_<?php echo $row['serviceID']?>" id="vendors_<?php echo $row['serviceID']?>" onchange="loadPackage('<?php echo $row['serviceID']?> ')" class="form-control ">
                        <option value=""><b>Select</b></option>
                        <?php passComboValueVendors($row['serviceID']); ?>
                        </select>
                    </td>
                  
                    <td>
                      <select name="package_<?php echo $row['serviceID']?>" id="package_<?php echo $row['serviceID']?>" onchange="loadPackageDetails('<?php echo $row['serviceID']?> ')"class="form-control ">
                        <option value=""><b>Select</b></option>     
                     </select>
                  </td>


                    <td><input type="hidden" id="hdnPrice_<?php echo $row['serviceID']?>" name="hdnPrice_<?php echo $row['serviceID'] ?>" value="" ><label id="lblPrice_<?php echo $row['serviceID']?>"></label></td>
                    <script>

                        </script>
                    <td><button type="button" class="btn btn-info btn-rounded btn-sm fw-bold" onclick="openPackageDetails(<?php echo $row['serviceID']?>)" \>View Package Details</button></td>
                </tr>

            <?php array_push($serviceIDArr,$row['serviceID']); }
            ?>

            </tbody>
            <div>
            <button type="submit" class="btn btn-success btn-rounded btn-lg fw-bold" data-mdb-ripple-color="dark" name="submit" \>Submit Booking</button>
            </div> 
            </table>

      
        
        </form>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

    function loadPackageDetails(id){
        var str1=$('#package_'+id).val();
        if(window.XMLHttpRequest){
             xmlhttp= new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
             xmlhttp.onreadystatechange= function(){
                 if(this.readyState==4 && this.status==200){
                    $('#lblPrice_'+id).html(this.responseText);
                    $('#hdnPrice_'+id).val(this.responseText);
                     
                 }
                 };
                  xmlhttp.open("GET","loadVendors.php?p="+str1,true);
                  xmlhttp.send();
    }

    function loadPackage(id){
        var str=id;
        var str1=$('#vendors_'+id).val();
        str=str+"_"+str1;
        var cmb=$('#package_'+id);
        if(window.XMLHttpRequest){
             xmlhttp= new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
             xmlhttp.onreadystatechange= function(){
                 if(this.readyState==4 && this.status==200){
                     $('#package_'+id+' option').remove();                     
                    
                     //console.log(this.responseText);
                     $('#package_'+id).append(this.responseText);
                     loadPackageDetails(id);
                     
                 }
                 };
                  xmlhttp.open("GET","loadPackage.php?p="+str,true);
                  xmlhttp.send();
    }


    function openPackageDetails(id){
        var str1=$('#package_'+id).val();
        if (str1 > 0 ) {
          window.open(
            'openPackageDetails.php?p='+str1,'_blank'
        );
        }
        else{
          alert("Please select the package");
        }

    }
</script>


            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!--Section: Design Block-->
</div>





</body>
</html>




<?php
 if(isset($_POST['submit'])){

    $date=$customerDetailsArray[1];
    $daytypeId=$customerDetailsArray[2];
    $placeid=$customerDetailsArray[0];
    $numGuest=$customerDetailsArray[3];

    //customer previous booking check
    $sqlcheck=mysqli_query($conp,"select customerID from booking where customerID=$sid and is_booking=0");
    if(mysqli_num_rows($sqlcheck)>0){

        echo '<script>if(confirm("You have allready booked! Press Ok Back to Profile")){
            window.location.href="customerProfile.php";
        }else{
            
        }</script>';
   
    }
    else{
        $sql="insert into booking (Date,dayTypeID,customerID,placeID,numberOfGuest,is_booking) values
        ('$date',$daytypeId,$sid,$placeid,$numGuest,0)";
       
        mysqli_query($conp,$sql);
    
        $sql1="select bookingID from booking order by bookingID desc limit 1";
        $rs=mysqli_query($conp,$sql1);
        $rowId=mysqli_fetch_assoc($rs);
        $bookingId=$rowId['bookingID'];
    
        $i=count($serviceIDArr);
        $x=0;
        while($i){
            $serviceID=$serviceIDArr[$x];
            $providerId=$_POST['vendors_'.$serviceID];
            $packageID=$_POST['package_'.$serviceID];
            $price=$_POST['hdnPrice_'.$serviceID];
           
    
    
            if(strlen($_POST['vendors_'.$serviceID])>0 && strlen($_POST['package_'.$serviceID])>0){
               // echo "<script>alert('$packageID')</script>";
                $sql2="insert into bookingprice (bookingID,regiProviderID,serviceID,packageID,price,status) values
                ($bookingId,$providerId,$serviceID,$packageID,$price,0)";
                mysqli_query($conp,$sql2);
                
                $sql2="insert into providerrate(customerID,providerID,rate) values
                ($sid,$providerId,0)";
                mysqli_query($conp,$sql2);
    
            }
    
            $x++;
            $i--;
        } 
      
        echo '<script>if(confirm("Booking Successfully Completed")){
          window.location.href="customerProfile.php";
      }else{
          
      }</script>';

    }
    
    
 }
?>