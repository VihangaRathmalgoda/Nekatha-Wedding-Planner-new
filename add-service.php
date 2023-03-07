<?php session_start();?>
<?php require_once('connection.php');?>

<?php
if(!isset($_SESSION['adminid'])){
  header('Location:main.php');
}
    //check required feild 
        $errors=array();
        if(isset($_POST['submit'])){
 
            $req_fields=array('servicename','servicedescrip');

                foreach($req_fields as $field){

                if(empty(trim($_POST[$field]))){
                    $errors[]=$field.' is Required'.'</br>';
                }
            }

    //check service SQL part        
            $servicename=mysqli_real_escape_string($conp,$_POST['servicename']);
            $query="SELECT * FROM service WHERE serviceName='{$servicename}' LIMIT 1";

            $result_set=mysqli_query($conp,$query);
            if($result_set){
                if(mysqli_num_rows($result_set)==1){

                    $errors[]='<div class="alert alert-danger" role="alert">
                    Service name already exists !
                  </div>';
                }
            }

            if(empty($errors)){

                $servicename=mysqli_real_escape_string($conp,$_POST['servicename']);
                $servicedescrip=mysqli_real_escape_string($conp,$_POST['servicedescrip']);
                
    //SQL Insert query
                $query="INSERT INTO service (";
                $query.="serviceName,serviceDescription,is_service";
                $query.=")VALUES(";
                $query.="'$servicename','$servicedescrip',0";	
                $query.=")";

                $result=mysqli_query($conp,$query);
                if($result){

                    header('Location:servicesdashboard.php?service_added=true');

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
    <title>staff add form</title>
    <!--- CSS File--->
    <link rel="stylesheet" href="styleStf.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    
    
  </head>
  <body>
  <script src="tinymce/tinymce.min.js"></script> 
    <section class="container col-md-6">
      <header>Add new service</header>

<!-- preview form error -->
        <?php
            if(!empty($errors)){
                echo '<div class="errmsg">';
                echo '<div class="alert alert-danger" role="alert">
                There were errors on your form !
              </div>';
               
                
                foreach($errors as $error){
                    echo $error.'</br>';
                }
                echo '</div>';
                
            }
        ?>


      <form action="add-service.php" method="POST"  class="form"  class="staffform">
       
        <div class="input-box">
          <label>Service :</label>
          <input type="text" name="servicename" required />
        </div>

        <div>
          <label>Details :</label>
          <textarea name="servicedescrip" id="servicedescrip" cols="80" rows="15" ></textarea>
        </div>

       

      <!-- form submit button -->
       <button class='btn btn-info btn-sm' name="submit">Add</button>
        <!--back button -->
       <a href="staffdashboard.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


      </form>
    </section>
    <script>
    tinymce.init({
        selector:'#servicedescrip',
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