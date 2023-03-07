<?php session_start();?>
<?php require_once('../connection.php');?>
<?php
if(isset($_SESSION['id'])){
    header('Location:ProviderLogin.php');
}

$sid=$_SESSION['regiProviderID'];
$sName=$_SESSION['providerName'];
$provider_list='';
$provider_list1='';            

        $provider_list.="<tr>"; 
        $provider_list.="<td><a href=\"viewownprovider.php?id={$_SESSION['regiProviderID']}\"><li class='dropdown-item' >Profile</li></a></td>";
        $provider_list.="</tr>";                                                              
        $provider_list1.="<tr>"; 
        $provider_list1.="<td><a href=\"regiProviderJobs.php?id={$_SESSION['regiProviderID']}\"><button>Jobs</button></a></td>";
        $provider_list1.="<tr>"; 
        $provider_list2='';
        $provider_list2.="<td><a href=\"providerPackage.php?id={$_SESSION['regiProviderID']}\"><button>Packages</button></a></td>"; 
        $provider_list2.="</tr>";

        $query="select images from regiprovider where regiproviderID='$sid'";
        $result_set=mysqli_query($conp,$query);

        if($result_set){

            if(mysqli_num_rows($result_set)==1){
                //found record
              
                $result=mysqli_fetch_assoc($result_set);
    
                $image =$result['images'];
    
            }
            else{
                //Not found record
                header(('Location:regiProviderdashboard.php? err=Not_found'));
    
            }
        }
        else{
            //unsuccessfull query
            header(('Location:regiProviderdashboard.php? err=query_faild'));
        }
        

$packages_list4='';
$pID=$_SESSION['regiProviderID'];
// $query="SELECT * FROM package WHERE is_package=0  ORDER BY packageName";
$query="select p.* from package as p,packagehandling as h,service as s WHERE p.packageID=h.packageID ANd s.serviceID=h.serviceID AND is_package=0 and h.regiProviderID ='$pID'";

$package=mysqli_query($conp,$query);

//fill staff details to table

if($package){
    while($package1=mysqli_fetch_assoc($package)){

        $packages_list4.="<tr>";
        $packages_list4.="<td>{$package1['packageID']}</td>";
        $packages_list4.="<td>{$package1['packageName']}</td>";
        // $packages_list.="<td><div>{$package1['packageDescription']}</div></td>";
        $packages_list4.="<td>{$package1['packagePrice']}</td>";
        $packages_list4.="<td><a href=\"viewProviderPackage.php?id={$package1['packageID']}\"><button class='btn btn-info btn-rounded btn-sm fw-bold'>View</button></a></td>";
        $packages_list4.="<td><a href=\"modilyPackage.php?id={$package1['packageID']}\"><button class='btn btn-primary btn-rounded btn-sm fw-bold'>Edit</button></a></td>";
        $packages_list4.="<td><a href=\"deletePackage.php?id={$package1['packageID']}\"><button class='btn btn-danger btn-rounded btn-sm fw-bold'>Delete</button></a></td>";
        $packages_list4.="</tr>";
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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>provider dashboard</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
 
</head>

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
       
          <a href="regiProviderDashboard.php" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-lock fa-fw me-3"></i><span>Jobs</span></a>
          <a href="providerPackage.php" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-chart-line fa-fw me-3"></i><span>Packages</span></a>
          
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">


        <!-- Brand -->
        <div class="sidebar-heading text-center py-2 primary-text fs-4 fw-bold text-uppercase border-bottom" style="color:#FF577F"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 20">
            <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
            </svg></i></i>Nekatha</div>

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
         
 <!-- Icon -->
       
          
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                       id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                          <img src='<?php echo "uploads/".$image ?>' class="rounded-circle me-3" style=" width: 30px; height: 30px;"
                          alt="" loading="lazy" />
                    </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" style="color: #FF577F;"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2" ></i>Hello, <?php echo $_SESSION['providerName']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"  href="viewownprovider.php"><?php echo $provider_list; ?></a></li>
                                <li><a class="dropdown-item" href="providerlogout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
          <!-- Avatar -->


    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
      <!-- Section: Main chart -->
      <section class="mb-4">
        <div class="card">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>Your Packages</strong></h5>
          </div>
          <div class="col-md-5" >
                     <!--   <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">/#sidebar-wrapper --> 
                        

                            <div class="row">
                              <div class="col-md-4 mb-2">
                               <div class="form-outline">
                                <a href="addPackage.php"><button type="submit" name="check" class="btn btn-warning btn-rounded float-end button-color " style="background-color: #d1ac5d;"
                                 data-mdb-ripple-color="dark">
                                 Add
                                 </button></a>
                              </div>
                             </div>

          </div>


                       <!--     <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                       // </div>--> 
                    </div>
          <div class="row my-5">
                    <h5 class="fs-4 mb-3">Recent Orders</h5>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" >ID</th>
                                    <th scope="col">Package Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" width="5"></th>
                                    <th scope="col" width="5"></th>
                                    <th scope="col" width="5"></th>
                                </tr>
                            </thead>
                             <?php echo $packages_list4; ?>
                        </table>
                    </div>
                </div>

          
        </div>
      </section>
  </main>
  <!--Main layout-->
  
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/admin.js"></script>

</body>

</html>