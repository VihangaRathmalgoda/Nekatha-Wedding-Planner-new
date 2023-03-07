<?php
    
    if(isset($_POST['send'])){
        include "../connection.php";

   // $nic=mysqli_real_escape_string($conp,$_POST['nic']);
    $name=mysqli_real_escape_string($conp,$_POST['name']);
    $email=mysqli_real_escape_string($conp,$_POST['email']);
    $cnumber=mysqli_real_escape_string($conp,$_POST['cnumber']);
    $massage=mysqli_real_escape_string($conp,$_POST['massage']);


    $sqlin="INSERT INTO inquiry(inquaryName,
    contactNumber,email,massage)
    VALUES
    ('$name','$cnumber','$email','$massage')";


   
   if(mysqli_query($conp,$sqlin))
    {

      echo '<script>if(confirm("Your Inquiry has Successfully Sent. We Will Reply You Soon on Email !")){
        window.location.href="front.php";
    }else{
        
    }</script>';
   
       
    }
    else
    {
    echo "<script>
    alert('Your Inquiry has NOT Successfully Sent');
    </script>";

    }
    
   
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact NEKATHA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-2 bg-image" style="background-image: url('../frontend/img/6.jpg'); height: 300px;">
        </div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(10px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Send inquary</h2>
          
          <form action="inquary.php" method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control"  name="name" required />
                  <label class="form-label" for="form3Example1">Name</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" name="cnumber" maxlength="10" minlength="10" required/>
                  <label class="form-label" for="form3Example2">Contact</label>
                </div>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" name="email" required/>
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example4" class="form-control"  name="massage" required/>
              <label class="form-label" for="form3Example4">Message</label>
            </div>

          

            <!-- Submit button -->
            <button type="submit" class="btn btn-danger btn-block mb-5"  name="send"  style="background-color:#FF577F">
                  Send
                </button>


            
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>