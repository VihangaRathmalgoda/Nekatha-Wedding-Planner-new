<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer register</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
   <!-- Section Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image:  url('../frontend/img/6.jpg');
  
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
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: #d1ac5d">
          NEKATHA  <br />
          <span style="color: hsl(218, 81%, 75%)">Plan your dream wedding</span>
        </h1>
        <p class="mb-4 opacity-70" style="#b7bbc5">
        Traditionally, planning a wedding has always been a long process which involves a 
        lot of time, money, effort, stress and high risks. Nekatha Wedding Planners provides 
        a key role in making sure that you enjoy your wedding day as you have dreamed of, 
        and we will make sure that all things will go smoothly according to the plan..
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <form action="" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="customerID" maxlength="12" minlength="10" required/>
                    <label class="form-label" for="form3Example1">Customer NIC</label>
                  </div>
                </div>
                 <!-- User name -->
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" name="username" required/>
                    <label class="form-label" for="form3Example2">User name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="customerEmail" required />
                <label class="form-label" for="form3Example3">Email</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password" minlength="6" maxlength="6" required/>
                <label class="form-label" for="form3Example4">Password</label>
              </div>

                 <!-- Bride name -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="brideName" required/>
                    <label class="form-label" for="form3Example1">Bride name</label>
                  </div>
                   <!-- Groom name -->
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control"name="groomName" required/>
                    <label class="form-label" for="form3Example2">Groom name</label>
                  </div>
                </div>
              </div>

                <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text " id="form3Example3" class="form-control"  name="contactNumber" maxlength="10" minlength="10" required />
                <label class="form-label" for="form3Example3">Contact</label>
              </div>

              

              <!-- Submit button -->
              <button type="submit" name="login" class="btn btn-primary btn-block mb-4"  style="background-color: #E93B81";>
                Sign up
              </button>

           

             
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    
<?php
    //get input data
    if(isset($_POST['login'])){
        include "../connection.php";
        $customerID=mysqli_real_escape_string($conp,$_POST['customerID']);
        $userName=mysqli_real_escape_string($conp,$_POST['username']);
        $password=mysqli_real_escape_string($conp,$_POST['password']);
        $cEmail=mysqli_real_escape_string($conp,$_POST['customerEmail']);
        $brideName=mysqli_real_escape_string($conp,$_POST['brideName']);
        $groomName=mysqli_real_escape_string($conp,$_POST['groomName']);
        $cNumber=mysqli_real_escape_string($conp,$_POST['contactNumber']);
        //insert data to DB
        // $hashed_password=sha1($password);
        
        $sqlin="INSERT INTO customer(customerID,customerUserName,
        customerEmail,bride,groom,customerContactNumber,customerPassword)
        VALUES
        ('$customerID','$userName','$cEmail','$brideName','$groomName','$cNumber','$password')";
       //check the DB
        $select = mysqli_query($conp,"SELECT * FROM customer WHERE customerID = '$customerID'");
        if(mysqli_num_rows($select)>0) {
            echo"<script> 
            alert('This NIC is already used!');
            </script>";
        }
        else{
            if(preg_match('/^([0-9]{9}[x|X|v|V]|[0-9]{12})+$/',$customerID)){

            if(mysqli_query($conp,$sqlin))
            {
             echo "<script>
                alert('Account has Created Successfully');
                </script>";
                echo "<script>
                window.location.href='login.php'</script>";
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
            echo"<script>alert('Enter the valid NIC')</script>";

        }

        }

        
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>