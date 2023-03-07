<?php session_start();?>
<?php require_once('connection.php');
?>

<?php

        $errors=array();
        if(isset($_POST['submit'])){
            
            //check databse
            $lName=$_POST['lName'];
            $query="SELECT * FROM place WHERE name='{$lName}' AND is_place='1' LIMIT 1";

            $result_set=mysqli_query($conp,$query);
            if($result_set){
                if(mysqli_num_rows($result_set)==1){

                    $errors[]= '<div class="alert alert-danger" role="alert">
                    Location name is already exists !
                  </div>';
                }
            }

            if(empty($errors)){

                $lName=$_POST['lName'];
                $locationDescrip=$_POST['locationdescrip'];
                $location=$_POST['location'];
//Insert Image
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
//SQL Insert query
                $query="INSERT INTO place (";
                $query.="name,description ,location,is_place,images ";
                $query.=")VALUES(";
                $query.="'$lName','$locationDescrip','$location',1,'$fileNameNew'";	
                $query.=")";
            
    
               $result=mysqli_query($conp,$query);
                if($result){

                    header('Location:location.php?provider_added=true');

                }
                else{
                    $errors[]='Recored was Not Saved.';
                }
            }
        }
?>



<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>service add form</title>
    <!--- CSS File--->
    <link rel="stylesheet" href="styleStf.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    
  </head>
  <body>
  <script src="tinymce/tinymce.min.js"></script>  

    <section class="container  col-md-6">
      <header>Add Location</header>
    

    <main>
       
<!-- preview error message -->
    <?php
            if(!empty($errors)){
                echo '<div class="errmsg">';
                echo '<div class="alert alert-danger" role="alert">
                Some errors on your form !
              </div>';
               
                
                foreach($errors as $error){
                    echo $error.'</br>';
                }
                echo '</div>';
                
            }
        ?>

<form action="addLocation.php" class="form" method="POST" class="staffform" enctype="multipart/form-data">
       
       <div class="input-box">
         <label>Hotel Name</label>
         <input type="text"   name="lName" required/>
       </div>

    
       <p>
            <label for="">Details:</label>
           
            <textarea name="locationdescrip" id="locationdescrip" rows="4" ></textarea>
        </p>

        <div class="input-box">
         <label>Location</label>
         <input type="text"   name="location" required/>
       </div>

       <div class="input-box">
       <label class="form-label" for="customFile">Upload image</label>
       <input type="file"  id="customFile" name="file"  class="form-control" required/>
       </div>

     
       <button class='btn btn-info btn-sm' name="submit" >Save</button>
      
      <a href="location.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


     </form>
</main>
</section>


<!-- modify text area -->
<script>
    tinymce.init({
        selector:'#locationdescrip',
        plugins:['wordcount','advlist','autolink','lists','charmap',
        'preview','searchreplace','code','visualblocks','table',
        'fullscreen','help'],
        toolbar:'undo redo | block |' +
        'bold italic backcolor |alignleft aligncenter ' + 
        'alignright alignjustify | bullist numlist outdent indent | '+
        'removeformat | help ',
        content_style:'body { font-family:Helvetica,Arial,sans-serif;font-size:16px }'

    });
</script>

</body>
</html>