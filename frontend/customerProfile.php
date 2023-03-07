<?php session_start();
require_once"fillcombo.php";?>

<?php require_once('../connection.php');?>
<?php
if(isset($_SESSION['customerUserName'])){
   
$sname=$_SESSION['customerUserName'];
$sid=$_SESSION['customerID'];
$customer_details='';
$query="SELECT * FROM customer WHERE customerID='$sid'";
$weddingDate="";

$customer=mysqli_query($conp,$query);

//fill customer details to table

if($customer){
 
    $customer1=mysqli_fetch_assoc($customer);
   
 }
 else{
    echo "Database query failed";
 }
 if(isset($_POST['check'])){

    $placeID=mysqli_real_escape_string($conp,$_POST['v']);
    $checkdate=mysqli_real_escape_string($conp,$_POST['chackdate']);
    $daytype=mysqli_real_escape_string($conp,$_POST['daytype']);
    $noOfGuest=mysqli_real_escape_string($conp,$_POST['numberOfGuest']);

    $query="SELECT * FROM booking WHERE Date='$checkdate' AND dayTypeID='$daytype' AND placeID='$placeID' AND is_booking=0;";
  
    $rs=mysqli_query($conp,$query);
    $rowcount=mysqli_num_rows($rs);
    // echo $rowcount;
    // -----------------------------
      //customer previous booking check
    $sqlcheck=mysqli_query($conp,"select customerID from booking where customerID=$sid and is_booking=0");
    if(mysqli_num_rows($sqlcheck)>0){

        echo '<script>if(confirm("You have allready booked! Press Ok Back to Profile")){
            window.location.href="customerProfile.php"} else{}</script>';
        }else{

          if($rowcount>0){

        echo '<script>alert("Already Booked")</script>';
    }
    else{
        $customerDetailsarr=[$placeID,$checkdate,$daytype,$noOfGuest];
        $_SESSION['CDetails']=$customerDetailsarr;
        echo '<script>if(confirm("Press Ok continue Your Booking")){
            window.location.href="bookingproviders.php";
        }else{
            
        }</script>';
        
    }
            
        }
    // ----------------------------
    
 }

$isAlreadyBooked=false;
 $sql="SELECT bookingID,Date FROM booking WHERE customerID='$sid' AND is_booking=0;";
 $rs=mysqli_query($conp,$sql);
 //$diff="";
 if($row=mysqli_fetch_assoc($rs)){
    $checkdate=$row['Date'];
    $weddingDate=$checkdate;
    $bookingID=$row['bookingID'];
    $todate=date("Y-m-d");
    $date1=date_create($checkdate);
    $date2=date_create($todate);
    $diff=date_diff($date2,$date1);
    $isAlreadyBooked=$diff->format("%a")>30;
 }


 if(isset($_POST['submitCancel'])){
    try{
      $sql="update booking set is_booking=1 where customerID=$sid";
      mysqli_query($conp,$sql);
      $sql="update bookingprice set status=1 where bookingID=$bookingID";
      mysqli_query($conp,$sql);
    //   $sql="insert into canclation(BookinID)values
    //    ($bookingID)";
    //   mysqli_query($conp,$sql);
      echo "<script>
       window.location.href='customerProfile.php'</script>";

    }catch(Exception $e){
        echo $e->getMessage();
    }
 }
  
 //select function buttons


 if(isset($_POST['save'])){
  try{
   // echo "<script>alert()</script>";
    $sql="select bookingID from booking where customerID=$sid and is_booking=0;";
    $result=mysqli_query($conp,$sql);
    $row=mysqli_fetch_assoc($result);
    $bookingID= $row['bookingID'];

    $serviceId=$_POST['serviceID'];
    $vendor=$_POST['vendor'];
    $package=$_POST['package'];
    $price=$_POST['hdnPrice'];

    $sql1="update bookingprice set regiProviderID=$vendor , packageID=$package,price=$price, status=0 where bookingID=$bookingID and serviceID=$serviceId";
    mysqli_query($conp,$sql1);


  }catch(Exception $e){
    echo $e->getMessage();
  }
 }
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>customer dashboard</title>
  <!-- Font Awesome -->
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
  <link rel="stylesheet" href="cusCss.css" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
 
</head>

  <body>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <header>
   <!-- Navbar -->
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
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" style="color: #FF577F;"
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
    <!-- Navbar -->
</header>


  <div class="container my-5 py-5">
  <!--Section: Design Block-->
  <section>


    <!--page head topic-->
    <div class="row">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-body">
           
            <div class="row">
            <p class="text-uppercase h3 text-font text-center"  style="color: #d1ac5d;">Booking Details </p>
            
            <p class=" h4 text-font text-center"  style="color: red;" >
            <?php
              if(strlen($weddingDate)>0){
                $today=date('Y-m-d');
                $date1 = new DateTime("$weddingDate");
                $date2 = new DateTime($today);
                $interval = $date2->diff($date1);
                echo $interval->m." Months, ".$interval->d." Days more !";
              }?>
          
            </p>
            
            <div class="col-md-1">
              </div>
              <div class="col-md-8">
              </div>
            </div>
          </div>
        </div>
    <!--page head topic-->
        



<!-- customer booking details -->



        <div class="card mb-4">
          <div class="card-body">
          <form action=""  method="POST">
            <div class="row">
              <div class="col-md-4">
              <span class="mb-0 text-price">Select Hotel</span>
                <div class="form-group col-md-16">
                    <select id="inputState" name="v" class="form-control" required>
                    <option value="">Choose Hotel</option> 
                    <?php passComboValueVenue(); ?>
                     </select>
                </div>
              </div>

            </div>
            <br/>
            <div class="row">
              <div class="col-md-4">
              <span class="mb-0 text-price">Check Date</span>  
              <input type="date" name="chackdate" id="" min="2023-02-08" required class="form-control "/>
             
              </div>
              <div class="col-md-7">
              <button type="submit" name="check" class="btn btn-warning btn-rounded float-end button-color " style="background-color: #d1ac5d;"
                  data-mdb-ripple-color="dark">
                  Check
                </button>
              </div>
            </div>
            <div class="col-md-4">
              <span class="mb-0 text-price">Day Type</span>  
              <div class="form-group ">
                    <select id="inputState" name="daytype" class="form-control" required>
                    <option value="">Select</option> 
                     <option value="1">Day</option>
                     <option value="2">Night</option>
                     </select>
                </div>
            </div>
            <div class="col-md-4">
              <span class="mb-0 text-price">Number of Guest</span>  
              <div class="col-md-4">
                 <input type="number" id="typeNumber" class="form-control " name="numberOfGuest" min="50" max="500" required/>
              </div>
            </div>
            

          </div>
          </form>    

          
<!--table -->
          <div class="card mb-4">
          <div class="card-body">
          <div class="row my-5">
          <div class="card-header py-3">
            <h5 class="mb-0 text-font text-uppercase" style="color: #d1ac5d;">Details</h5>
          </div>

          <div class="card-header py-3">
          <?php if($isAlreadyBooked){ ?>
             <form method="POST" action="">
                <button type="submit" name="submitCancel" class="btn btn-warning btn-rounded float-end button-color " style="background-color: #d1ac5d;" data-mdb-ripple-color="dark"> Request to Cancel Booking</button>
            </form>
            <?php }?>
            </body>
            </html>
            <?php
            }else{
              header('Location:login.php');
            };
            ?>

          </div>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="10">Service</th>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"  width="5">View</th>
                                    <th scope="col" width="5">Status</th>
                                    <th scope="col" width="5">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql="select s.serviceID,s.serviceName, rp.providerName, p.packageName,p.packageID ,bp.price,bp.status from booking as b,
                                 bookingprice as bp, service as s, regiProvider as rp, package as p where bp.bookingID=b.bookingID and s.serviceID=bp.serviceID 
                                 and rp.regiProviderID=bp.regiProviderID and p.packageID=bp.packageID and b.is_booking=0 and b.customerID=$sid;";
                                $result=mysqli_query($conp,$sql);
                                while($row=mysqli_fetch_assoc($result)){
                                                                    
                                
                              ?>
                              <tr>
                                  <td><?php echo $row['serviceName']; ?> </td>
                                  <td><?php echo $row['providerName']; ?></td>
                                  <td><?php echo $row['packageName']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  <td><button type="button" class="btn btn-info btn-rounded btn-sm fw-bold" onclick="openPackageDetails(<?php echo $row['packageID']?>)" \>View</button></button></td>
                                  <td><?php 
                                  if($row['status']==0){
                                    echo "Pending for Approval";
                                  }
                                  else if($row['status']==2){
                                    echo "Approved";
                                  }else if($row['status']==3){
                                    echo "Rejected";
                                  }
                                  ?></td>
                                  <td>
                                    <?php
                                      if($row['status']==0 || $row['status']==3){
                                        $serviceID=$row['serviceID'];
                                        $serviceName=$row['serviceName'];
                                        echo "<button type='button' class='btn btn-warning btn-sm ' onclick='openEditModal(".$serviceID.",\"".$serviceName."\")' data-mdb-toggle='modal'>Edit</button>";
                                      }
                                    ?>
                                  </td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
        </div>
<!--table -->
     </div>
 <!-- Button trigger modal -->

      </div>
  
<!-- customer booking details -->



      <!-- customer details show part -->
      
      <div class="col-md-4 mb-4 position-static">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0 text-font" style="color: #d1ac5d;">Couple details <span class="float-end mt-1"
                style="font-size: 13px ;" onclick="window.location.href='editCustomerDetails.php?id=$sid'">Edit</span></h5>
          </div>
          <div class="card-body">
            <div class="row">
              
              <div class="col-md-6 ms-3">
                <span class="mb-0 text-price">NIC</span>
                <p class="mb-0 text-descriptions"><?php echo $customer1['customerID']; ?> </p>
                <span class="mb-0 text-price">USER NAME</span>
                <p class="mb-0 text-descriptions"><?php echo $customer1['customerUserName']; ?> </p>
                <span class="mb-0 text-price">EMAIL</span>
                <p class="mb-0 text-descriptions"><?php echo $customer1['customerEmail']; ?> </p>
                <span class="mb-0 text-price">CONTACT NO</span>
                <p class="mb-0 text-descriptions"><?php echo $customer1['customerContactNumber']; ?> </p>

                <p class="text-descriptions fw-bold">BRIDE :<span class="text-descriptions mt-0"><?php echo $customer1['bride']; ?></span>
                </p>
                <p class="text-descriptions fw-bold">GROOM :<span class="text-descriptions mt-0"><?php echo $customer1['groom']; ?></span>
                </p>
              </div>
            </div>
            <div class="card-footer mt-4">
              <ul class="list-group list-group-flush">
              
              <?php 
            $date1=date_create(date('Y-m-d'));
            $date2=date_create($weddingDate);
            $diff=date_diff($date1,$date2);
            if(0>$diff->format("%R%a")){
            ?>
            <form action="rating.php" method="POST">
            <button type="submit" name="rate" class="btn btn-outline-default waves-effect " ><i class="fas fa-star pr-2 text-center" aria-hidden="true"></i>Rate your Providers</button>
               
          </form><?php }?>

              </ul>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--Section: Design Block-->
</div>

<!-- Modal -->
<div class="modal fade modal-md" id="editModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Details</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method='POST' action=''>
        <table> 
            <tr>
              <td><h5>Service Name: </h5></td>
              <td><p id='serviceName'></p><input type="hidden" id='serviceID' name='serviceID'/></td>
            </tr>

            <tr>
              <td><h5>Vendor: </h5></td>
              <td><select name="vendor" id="vendor" onchange="loadPackage()" class="form-control ">
                <option value=""><b>Select</b></option>
                <?php // passComboValueVendors($row['serviceID']); ?>
              </select></td>
            </tr>

            <tr>
              <td><h5>Package: </h5></td>
              <td><select name="package" id="package" onchange="loadPackageDetails()" class="form-control ">
                  <option value=""><b>Select</b></option>     
              </select></td>
            </tr>
            <tr>
              <td><h5>Price: </h5></td>
              <td><input type="hidden" id="hdnPrice" name="hdnPrice" value="" >
              <label id="lblPrice"></label></td>
            </tr>

            <tr>
              <td></td>
              <td><button type="button" class="btn btn-info btn-rounded btn-sm fw-bold" onclick="openPackageDetails($('#package').val())" \>View Package Details</button></td>
            </tr>
        </table>
            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name='save' value="Save changes" /></form>
      </div>
    </div>
  </div>
</div>

<script>
    function viewContinue(){
        
    }

    function openPackageDetails(id){
        var str1=id;
        if (str1 > 0 ) {
          window.open(
            'openPackageDetails.php?p='+str1,'_blank'
        );
        }
        else{
          alert("Please select the package");
        }

    }

    function openEditModal(serviceID, serviceName){
      document.getElementById('serviceID').value=serviceID;
      document.getElementById('serviceName').innerHTML=serviceName;
      loadVendorsName(serviceID);
      
      $('#editModal').modal('show');
    }

    function loadPackage(){

        var str=$('#serviceID').val();
        var str1=$('#vendor').val();
        str=str+"_"+str1;
        if(window.XMLHttpRequest){
             xmlhttp= new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
             xmlhttp.onreadystatechange= function(){
                 if(this.readyState==4 && this.status==200){
                     $('#package option').remove();                     
                    
                     //console.log(this.responseText);
                     $('#package').append(this.responseText);
                     loadPackageDetails($('#package').val());
                     
                 }
                 };
                  xmlhttp.open("GET","loadPackage.php?p="+str,true);
                  xmlhttp.send();
    }

    function loadVendorsName(serviceID){
      if(window.XMLHttpRequest){
             xmlhttp= new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
             xmlhttp.onreadystatechange= function(){
                 if(this.readyState==4 && this.status==200){
                     $('#vendor option').remove();                     
                    
                     //console.log(this.responseText);
                     $('#vendor').append(this.responseText);
                     loadPackage();
                     loadPackageDetails(id);
                     
                 }
                 };
                  xmlhttp.open("GET","loadVendorsName.php?p="+serviceID,true);
                  xmlhttp.send();
    }

    function loadPackageDetails(id){
        var str1=$('#package').val();
        if(window.XMLHttpRequest){
             xmlhttp= new XMLHttpRequest();
            }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
             xmlhttp.onreadystatechange= function(){
                 if(this.readyState==4 && this.status==200){
                    $('#lblPrice').html(this.responseText);
                    $('#hdnPrice').val(this.responseText);
                     
                 }
                 };
                  xmlhttp.open("GET","loadVendors.php?p="+str1,true);
                  xmlhttp.send();
    }
</script>
