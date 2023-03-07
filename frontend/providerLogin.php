<?php session_start();?>
<?php require_once('../connection.php');?>

<?php
if(isset($_POST['submit'])){
    

    $errors=array();
    if( strlen(trim($_POST['regiProviderName']))<1)
    {
        $errors[]='User Name IS Misssing or Invalid';
        echo "<script>alert(1)</script>";

    }
    if(!isset($_POST['providerPassword']) || strlen(trim(($_POST['providerPassword'])))<1)
    {
        $errors[]='Provider Password IS Misssing or Invalid';
        echo "<script>alert(2)</script>";

    }
    if(empty($errors)){
        echo "<script>alert (Invalid Username or Password)</script>";
        $providerName =mysqli_real_escape_string($conp,$_POST['regiProviderName']);
        $providerPassword=mysqli_real_escape_string($conp,$_POST['providerPassword']);
        $providerPassword =SHA1($providerPassword);
        //$regiProviderID =mysqli_real_escape_string($conp,$_POST['$regiProviderID ']);

        $query="SELECT * FROM regiprovider
        where providerName ='{$providerName }'
        AND providerPassword='{$providerPassword}'
        AND is_provider='0'
        limit 1";

        
        $results_set=mysqli_query($conp,$query);

         if($results_set){

            if(mysqli_num_rows($results_set)==1){

                $provider=mysqli_fetch_assoc($results_set);
                $_SESSION['regiProviderID']=$provider['regiProviderID'];
                $_SESSION['providerName']=$provider['providerName'];
                header('Location:regiProviderDashboard.php');

            }
            else{
                $errors='Invalid Name or Password';
                // echo $query;
            }
         }
         else
         {
            $errors='database Query Failed';
         }

    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Provider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
   <!-- Section: Design Block -->
   <section class="background-radial-gradient overflow-hidden">
<style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image:  url('frontend/img/6.jpg');
  
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#E93B81, #df96a7);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#df96a7, #E93B81);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent"  >
    <div class="container">
    <div  class="sidebar-heading text-center py-2 primary-text fs-4 fw-bold text-uppercase border-bottom" style="color:#FF577F; text:bold"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 20">
            <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
            </svg></i></i>
            <a href="front.php" style="color:transparent"><h6 style="color:#FF577F">Nekatha</h6></div></a>
    </div>
</nav>
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <h4 class="my-5  ls-tight" style="color:#b48f3d">
            Join as Provider<br />
      </h4>  
          <h1 class="my-5 display-3 fw-bold ls-tight" style="color:#b48f3d">
            JOIN WITH  <br />
            <span class="text-priary" style="color:#FF577F">Nekatha</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
          Join us, Sri Lanka's foremost organization that provides the best service for weddings
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form action="providerLogin.php" method="POST">
            <?php

if(isset($errors) && !empty($errors)){

    echo '<div class="alert alert-danger" role="alert">
    Invalid youser name or password !
  </div>';
}

?>
<?php
if(isset($_GET['logout']))
{
echo '<div class="alert alert-primary" role="alert">
You have successfuly logout the system !
</div>';
}
?> 
               
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" class="form-control" name="regiProviderName" required/>
                  <label class="form-label" for="form3Example3">Name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control"  name="providerPassword"  minlength="6" maxlength="6"  required />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                
                <br/>
                <br/>
                <br/>

                <!-- Submit button -->
                <button type="submit"  name="submit" class="btn btn-primary btn-block mb-4"  style="background-color:#FF577F">
                  Login
                </button>
                <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button onclick="window.location.href='providerCreateAc.php'" class="btn btn-light btn-lg">Create new</button>
                  </div>

               
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
   
  </body>
</html>
<?php mysqli_close($conp);?>
