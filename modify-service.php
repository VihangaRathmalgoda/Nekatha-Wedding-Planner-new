<?php session_start();?>
<?php require_once('connection.php');?>

<?php

if(!isset($_SESSION['adminid'])){
    header('Location:main.php');
}
        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the service info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
  
    //SQL select query
    $query="SELECT * FROM service WHERE serviceID={$id} LIMIT 1";
    $result_set=mysqli_query($conp,$query);

    if($result_set){
        if(mysqli_num_rows($result_set)==1){
            //found record
            $result=mysqli_fetch_assoc($result_set);
            $servicename=$result['serviceName'];
            $servicedescrip=$result['serviceDescription'];
        }
        else{
            //Not found record
            header(('Location:servicesdashboard.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:servicesdashboard.php? err=query_faild'));
    }

}

if(isset($_POST['submit'])){
//Print requre feild error message
    $req_fields=array('servicename','servicedescrip');

        foreach($req_fields as $field){

        if(empty(trim($_POST[$field]))){
            $errors[]=$field.' is Required'.'</br>';
        }
    }

    if(empty($errors)){

        $servicename=mysqli_real_escape_string($conp,$_POST['servicename']);
        $servicedescrip=mysqli_real_escape_string($conp,$_POST['servicedescrip']);
       $idno =mysqli_real_escape_string($conp,$_POST['id']);
      
//SQL Update service details query
       $query = "update service set serviceName ='$servicename', serviceDescription='$servicedescrip' where serviceID='$idno' ";

        $result=mysqli_query($conp,$query);
        if($result){

            header('Location:servicesdashboard.php?staff_added=true');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>modify service</title>
    <!---CSS File--->
    <link rel="stylesheet" href="styleStf.css" />
  </head>

<body>
<script src="tinymce/tinymce.min.js"></script>
<section class="container">
<header>Modify Service</header>
   
<!--preview error message -->
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

<form action="modify-service.php" method="POST" class="form" class="staffform">
       
       <div class="input-box">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
         <label>Name:</label>
         <input type="text" name="servicename" id="" value="<?php echo $servicename; ?>">
       </div>

       <div class="input-box">
         <label>Description:</label>
         <textarea name="servicedescrip" id="servicedescrip" cols="30" rows="10"><?php echo $servicedescrip; ?></textarea>
       </div>
        <!-- submit button -->
       <button class='btn btn-info btn-sm' name="submit" >Save</button>
       <!-- back button -->
      <a href="servicesdashboard.php"><button type="button" name="submit" class="btn btn-info">Back</button> </a>


     </form>

<!-- modify text area -->
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