<?php session_start();?>
<?php require_once('../connection.php');?>

<?php



        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the service info
    
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
    $query="SELECT * FROM package WHERE packageID={$id} LIMIT 1";
    //echo $query;

    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $packagename=$result['packageName'];
            $packagedescrip=$result['packageDescription'];
            $price=$result['packagePrice'];
           
           

        }
        else{
            //Not found record
            header(('Location:providerPackage.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:providerPackage.php? err=query_faild'));
    }

}

if(isset($_POST['submit'])){
          
            
    $req_fields=array('packagename','packagedescrip','price');

        foreach($req_fields as $field){

        if(empty(trim($_POST[$field]))){
            $errors[]=$field.' is Required'.'</br>';
        }
    

    }



    if(empty($errors)){

        
        $packagename=mysqli_real_escape_string($conp,$_POST['packagename']);
        $packagedescrip=mysqli_real_escape_string($conp,$_POST['packagedescrip']);
        $price=mysqli_real_escape_string($conp,$_POST['price']);
       $idno =mysqli_real_escape_string($conp,$_POST['id']);
      

       $query = "update package set packageName ='$packagename', packageDescription	='$packagedescrip', packagePrice='$price' where packageID='$idno' ";
       echo $query;

        $result=mysqli_query($conp,$query);
        if($result){

            header('Location:providerPackage.php?package_added=true');

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
    <title>Edit package</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="styleStf.css" />

   <!--- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    
  </head>

<body>

<script src="../tinymce/tinymce.min.js"></script>
<section class="container">
<header>Edit package</header>
   

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

<form action="modilyPackage.php" method="POST" class="form" class="staffform">
       
       <div class="input-box">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
         <label>Name:</label>
         <input type="text" name="packagename"  value="<?php echo $packagename; ?>">
       </div>

       <div class="input-box">
         <label>Description:</label>
         <textarea name="packagedescrip" id="packagedescrip" cols="30" rows="10"><?php echo $packagedescrip; ?></textarea>
       </div>

       <div class="input-box">
         <label>Price</label>
         <input type="text" name="price"  value="<?php echo $price; ?>">
       </div>

     
       <button class='btn btn-info btn-sm' name="submit" >Save</button>
      
      <a href="providerPackage.php"><button type="button"  class="btn btn-info">Back</button> </a>

     </form>

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
</body>
</html>