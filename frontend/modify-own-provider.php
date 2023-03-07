<?php session_start();?>
<?php require_once('../connection.php');?>

<?php



        $errors=array();

$idno="";
        



if(isset($_GET['id'])){
    //get the provider info
    echo "<script>alert 'hi'</script>";
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    $query="SELECT * FROM regiprovider WHERE regiProviderID={$id} LIMIT 1";
    //echo $query;

    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $providername=$result['providerName'];
            //$providerdescrip=$result['providerDescription'];
           $provideremail=$result['email'];
           $providercnumber=$result['contactNumber'];
           

        }
        else{
            //Not found record
           // header(('Location:providersdashboard.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:regiProviderdashboard.php? err=query_faild'));
    }

}
$jobs=mysqli_query($conp,$query);

 $query="select images from regiprovider where regiproviderID='$id'";
 $result_set=mysqli_query($conp,$query);

 if($result_set){

     if(mysqli_num_rows($result_set)==1){
         //found record
       
         $result=mysqli_fetch_assoc($result_set);

         $image =$result['images'];
     }
    }
if(isset($_POST['submit'])){
          
            
    $req_fields=array('providername');

        foreach($req_fields as $field){

        if(empty(trim($_POST[$field]))){
            $errors[]=$field.' is Required'.'</br>';
        }
    

    }



    if(empty($errors)){

        
        $providername=mysqli_real_escape_string($conp,$_POST['providername']);
        //$providerdescrip=mysqli_real_escape_string($conp,$_POST['providerdescrip']);
        $provideremail=mysqli_real_escape_string($conp,$_POST['provideremail']);
        $providercnumber=mysqli_real_escape_string($conp,$_POST['cnumber']);
       $idno =mysqli_real_escape_string($conp,$_POST['id']);
      

       $query = "update regiProvider set providerName ='$providername', email='$provideremail',contactNumber='$providercnumber'  where regiProviderID='$idno' ";
       echo $query;

        $result=mysqli_query($conp,$query);
        if($result){

            header('Location:regiProviderDashboard.php?providers_added=true');

        }
        else{
            $errors[]='Recored was Not Modified';
        }
    }
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
      </div>
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
                                <li><a class="dropdown-item" href="providerlogout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
    </nav>
</header>
<!-- nav bar -->






<div class="container my-5 py-5">

  <!--Section: Design Block-->
 

  <section>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
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
          <form action="modify-provider.php" method="POST" class="staffform">
         
          <input type="hidden" name="id" value="<?php echo $id; ?>">


            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg"  name="providername" value="<?php echo $providername; ?>" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Email</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg" name="provideremail"  value="<?php echo $provideremail; ?>" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Contact NO</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg" name="cnumber"  value="<?php echo $providercnumber; ?>" />

              </div>
            </div>


            

            <div class="px-5 py-4">
              <button type="submit" name="submit" class="btn btn-primary btn-lg" style="background-color: #d1ac5d;">Save Details</button>
            </div>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>
  <!--Section: Design Block-->
</div>
</body>
</html>
