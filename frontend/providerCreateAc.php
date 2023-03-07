<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Provider create account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

<section class="">
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent"  >
    <div class="container">
    <div  class="sidebar-heading text-center py-2 primary-text fs-4 fw-bold text-uppercase border-bottom" style="color:#FF577F; text:bold"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 20">
            <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
            </svg></i></i>
            <a href="front.php" style="color:transparent"><h6 style="color:#FF577F">Nekatha</h6></div></a>
    </div>
</nav>
<form action="providerCreateAc.php" method="POST" enctype="multipart/form-data">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight" style="color:#b48f3d">
            JOIN WITH <br />
            <span class="text-primry" style="color:#FF577F">Nekatha</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
          Join us, Sri Lanka's foremost organization that provides the best service for weddings
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
           
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1" class="form-control" name="providername" required/>
                      <label class="form-label" for="form3Example1">Name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="password" id="form3Example2" class="form-control" name="password" minlength="6" maxlength="6" required />
                      <label class="form-label" for="form3Example2">Password</label>
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control"  name="provideremail" id="" placeholder="abs123@gmail.com" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" class="form-control" name="cnumber"   maxlength="10" required />
                  <label class="form-label" for="form3Example4">Contact</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" class="form-control"  name="location" required />
                  <label class="form-label" for="form3Example4">Location</label>
                </div>

                <!-- file choose -->
                <div class="col-md-14">

                <input class="form-control form-control-lg" id="formFileLg" type="file"  name="file" required/>
                <div class="small text-muted mt-2">Upload your Image/ Max file size 50 MB</div>

              </div>

              <br/>
                <!-- Submit button -->
                <button type="submit" class="btn btn-danger btn-block mb-4" name="login"  style="background-color:#FF577F">
                  Sign up
                </button>

                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
  </form>
</section>
<!-- Section: Design Block -->
    


<?php
    if(isset($_POST['login'])){
        include "../connection.php";
       
        $userName=mysqli_real_escape_string($conp,$_POST['providername']);
        $password=mysqli_real_escape_string($conp,$_POST['password']);
        $pEmail=mysqli_real_escape_string($conp,$_POST['provideremail']);
        $location=mysqli_real_escape_string($conp,$_POST['location']);
        $cNumber=mysqli_real_escape_string($conp,$_POST['cnumber']);
        // $images=mysqli_real_escape_string($conp,$_POST['cnumber']);

        $hashed_password=sha1($password);
        // --------------
        $file = $_FILES['file'];

                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
            
                $fileExt = explode('.',$fileName);
                $fileActualExt = strtolower(end($fileExt));
            
                $allowed =array('jpg','jpeg','png');
            
                if(in_array($fileActualExt,$allowed)){
                    if($fileError === 0){
                        if($fileSize < 5000000){
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            $fileDestination = 'uploads/'.$fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                        }else{
                            echo "Your file is too big!";
                        }
            
                    }else{
                        echo " There was an error uploading your file!";
                    }
                }else{
                    echo "You cannot upload files of this type!";
            
                }
        // ----------------
        
        $sqlin="INSERT INTO regiprovider(providerName,providerPassword,
        email,location,contactNumber,is_provider,images)
        VALUES
        ('$userName','$hashed_password','$pEmail','$location','$cNumber',0,'$fileNameNew')";
       
      
        // $select = mysqli_query($conp, "SELECT * FROM regiprovider WHERE providerName = '".$_POST['username']."'");
        
        $select = mysqli_query($conp, "SELECT * FROM regiprovider WHERE providerName = '$userName'");

        if(mysqli_num_rows($select)>0) {
           
            echo"<script> 
            alert('This User Name is already used!');
            </script>";           
        }
        else{
            if(preg_match('/^([0-9]{10})+$/',$cNumber))
            {
            if(mysqli_query($conp,$sqlin))
            {
             echo "<script>
                alert('Account has Created Successfully');
                </script>";
                // header("location:providerLogin.php");
                echo "<script>
                window.location.href='providerLogin.php'</script>";
                

            }
            else
            {
            echo "<script>
            alert('Account has NOT Created Successfully');
            </script>";
    
            }
        }
        else
        {
            echo "<script>alert('Enter the valid phone number')</script>";
        }

        }

        
    }
    ?>

  </body>
</html>