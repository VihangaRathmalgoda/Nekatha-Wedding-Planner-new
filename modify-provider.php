<?php session_start();?>
<?php require_once('connection.php');?>

<?php
if(!isset($_SESSION['adminid'])){
    header('Location:main.php');
}

        $errors=array();

$idno="";
        
if(isset($_GET['id'])){
    //get the provider info
    echo "<script>alert 'hi'</script>";
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conp,($_GET['id']));
  
  //SQL select query
    $query="SELECT * FROM regiprovider WHERE regiProviderID={$id} LIMIT 1";
    $result_set=mysqli_query($conp,$query);

    if($result_set){

        if(mysqli_num_rows($result_set)==1){
            //found record
          
            $result=mysqli_fetch_assoc($result_set);
            
            $providername=$result['providerName'];
           $provideremail=$result['email'];
           $providercnumber=$result['contactNumber'];
           

        }
        else{
            //Not found record
            header(('Location:providersdashboard.php? err=Not_found'));

        }
    }
    else{
        //unsuccessfull query
        header(('Location:providersdashboard.php? err=query_faild'));
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
        $provideremail=mysqli_real_escape_string($conp,$_POST['provideremail']);
        $providercnumber=mysqli_real_escape_string($conp,$_POST['cnumber']);
       $idno =mysqli_real_escape_string($conp,$_POST['id']);
      

       $query = "update regiProvider set providerName ='$providername', email='$provideremail',contactNumber='$providercnumber'  where regiProviderID='$idno' ";
       echo $query;

        $result=mysqli_query($conp,$query);
        if($result){

            header('Location:providersdashboard.php?providers_added=true');

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View/Modify provider</title>
    <link rel="stylesheet" href="service&providers.css">
</head>

<body>
<script src="../../tinymce/tinymce.min.js"></script> 
    
<header>
    <div class="appname">නැකත Wedding Planners</div>
    <div class="dashboard">Welcome <?php echo $_SESSION['username']; ?> !<a href="logout.php">Log Out</a></div>
</header>
    <h1 align="center">Welcome to Admin Dashboard</h1>

    <main>
        <h1>Modify Provider <span><a href="providersdashboard.php"><button>Back to Provider dashboard</button></a></span></h1>

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
            <p>
            <label for="">Name:</label>
            <input type="text" name="providername" id="" value="<?php echo $providername; ?>" >
            </p>
            <p>
            <label for="">Email:</label>
            <input type="text" name="provideremail" id="" value="<?php echo $provideremail; ?>" >
            </p>
            <p>
            <label for="">Contact NO.:</label>
            <input type="text" name="cnumber" id="" value="<?php echo $providercnumber; ?>" >
            </p>

            <!-- <p>
            <label for="">Description:</label>
            
            <textarea name="providerdescrip" id="providerdescrip" cols="30" rows="10"><?php echo $providerdescrip; ?></textarea>
            </p> -->
            

            <p>
            <label for="">&nbsp;</label>
            <input type="submit" name="submit" value="Save"/>
            </p>
        </form>
</main>

<script>
    tinymce.init({
        selector:'#providerdescrip',
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