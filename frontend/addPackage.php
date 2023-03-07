<?php session_start();?>
<?php require_once('../connection.php');
require_once"fillcombo.php";?>

<?php
        $pID=$_SESSION['regiProviderID'];
        //show error massage
        $errors=array();
        if(isset($_POST['submit'])){
 
            $req_fields=array('packagename','packagedescrip','price');

                foreach($req_fields as $field){

                if(empty(trim($_POST[$field]))){
                    $errors[]=$field.' is Required'.'</br>';
                }
            

            }

            $packagename=mysqli_real_escape_string($conp,$_POST['packagename']);

            //get all packages related with provider ID and service
            
            $query="SELECT p.*,r.regiProviderID FROM package as p, regiprovider as r,packagehandling as h WHERE h.regiProviderID=r.regiProviderID and p.packageID=h.packageID and p.packageName='{$packagename}' and r.regiProviderID='$pID' LIMIT 1";
          

            $result_set=mysqli_query($conp,$query);
            if($result_set){
                if(mysqli_num_rows($result_set)==1){
            //print error message
                    $errors[]='<div class="alert alert-danger" role="alert">
                    You already entered this package !
                  </div>';
                    
                }
            }

            //collect data
            if(empty($errors)){

                $packagename=mysqli_real_escape_string($conp,$_POST['packagename']);
                $packagedescrip=mysqli_real_escape_string($conp,$_POST['packagedescrip']);
                $price=mysqli_real_escape_string($conp,$_POST['price']);
                $sID=mysqli_real_escape_string($conp,$_POST['serviceCategory']);
                $rejiProviderID=$_SESSION['regiProviderID'];

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
                
                //SQL insert query part
                $query="INSERT INTO package (";
                $query.="packageName,packageDescription,packagePrice,is_package";
                $query.=")VALUES(";
                $query.="'$packagename','$packagedescrip','$price',0";	
                $query.=")";

                $result=mysqli_query($conp,$query);


                if($result){

                    $q1 =  "Select * from package order by packageID desc limit 1";
                    $v= mysqli_query($conp,$q1);

                    if($v){

                        if(mysqli_num_rows($v)==1){
                            //found record
                          
                            $result=mysqli_fetch_assoc($v);
                            // echo $q1;
                            $packageID=$result['packageID'];
                            $query="INSERT INTO packagehandling (";
                            $query.="packageID,serviceID,regiProviderID,image,price,description";
                            $query.=")VALUES(";
                            $query.="'$packageID','$sID','$rejiProviderID','$fileNameNew','$price','$packagedescrip'";	
                            $query.=")";

            
                            $result=mysqli_query($conp,$query);
                            header(('Location:providerPackage.php'));
                            
                         
                
                        }
                        else{
                            //Not found record
                            // header(('Location:viewProvider.php? err=Not_found'));
                
                        }
                    }
                    else{
                        //unsuccessfull query
                        // header(('Location:viewProvider.php? err=query_faild'));
                    }

                    // header('Location:providerPackage.php?package_added=true');

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
    <title>add package</title>
    <!--- CSS File--->
    <link rel="stylesheet" href="styleStf.css" />

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    
    
  </head>
  <body>
  <script src="../tinymce/tinymce.min.js"></script>  

    <section class="container col-md-6">
      <header>Add Package</header>
    <main>
       
<!-- preview error message-->
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

<form action="addPackage.php" class="form" method="POST" class="staffform" enctype="multipart/form-data">
       
            <!-- Package name  -->
       <div class="input-box">
         <label>Package</label>
         <input type="text"   name="packagename" required/>
       </div>

<br/>    
       <!-- combo service  -->
        <div class="form-group col-md-3">
                <label for="inputState">Service</label>
                    <select id="inputState" name="serviceCategory" class="form-control">
                     <option selected>Choose...</option>
                     <?php passComboValue(); ?>
                    </select>
        </div>
<br/>
          <!--  text area part  -->
        <p>
            <label for="">Details:</label>
           
            <textarea name="packagedescrip" id="packagedescrip" cols="80" rows="15"></textarea>
        </p>


        <!--  text area part  -->
        <div class="input-box">
         <label>Price</label>
         <input type="text"   name="price" required/>
       </div>

<br/>
     
        <!-- file choose -->
        <div class="col-md-12 ">
        <label>Upload Image</label>
        <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" required/>
        <div class="small text-muted mt-2">Upload image. Max file
        size 20 MB</div>

        </div>

       
        <!-- form submit button -->
        <button class='btn btn-info btn-sm' name="submit" >Save</button>
       
        <a href="providerPackage.php"><button type="button" class="btn btn-info">Back</button> </a>


     </form>
     
</main>


<!-- edit text area -->
<script>
    tinymce.init({
        selector:'#packagedescrip',
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

</section>
</body>
</html>