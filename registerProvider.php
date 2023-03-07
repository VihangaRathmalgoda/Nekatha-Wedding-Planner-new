
<?php session_start();?>
<?php require_once('connection.php');
require_once "fillcombo.php";?>

<?php

        $errors=array();
        if(isset($_POST['submit'])){
 
            $req_fields=array('providername','provideremail','location');

                foreach($req_fields as $field){

                if(empty(trim($_POST[$field]))){
                    $errors[]=$field.' is Required'.'</br>';
                }
            

            }

            $providername=mysqli_real_escape_string($conp,$_POST['providername']);
            $query="SELECT * FROM regiProvider WHERE providerName='{$providername}' LIMIT 1";

            $result_set=mysqli_query($conp,$query);
            if($result_set){
                if(mysqli_num_rows($result_set)==1){

                    $errors[]='Provider Name already Exists.';
                }
            }

            if(empty($errors)){

                $providername=mysqli_real_escape_string($conp,$_POST['providername']);
                $provideremail=mysqli_real_escape_string($conp,$_POST['provideremail']);
                $providercNumber=mysqli_real_escape_string($conp,$_POST['cnumber']);
                $providerlocation=mysqli_real_escape_string($conp,$_POST['location']);
                

                $query="INSERT INTO regiProvider (";
                $query.="providerName,email,location,contactNumber";
                $query.=")VALUES(";
                $query.="'$providername','$provideremail','$providerlocation','$providercNumber'";	
                $query.=")";

                $result=mysqli_query($conp,$query);
                if($result){

                    header('Location:add-provider.php?provider_added=true');

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Provider</title>
    <link rel="stylesheet" href="service&providers.css">
</head>

<body>
<header>
    <div class="appname">නැකත Wedding Planners</div>
    <div class="dashboard">Welcome <?php echo $_SESSION['username']; ?> !<a href="logout.php">Log Out</a></div>
</header>
    <h1 align="center">Welcome to Admin Dashboard</h1>

    <main>
        <h1>Register Provider<span><a href="add-provider.php"><button>Back to Add providers dashboard</button></a></span></h1>
        
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

        <form action="registerProvider.php" method="POST" class="staffform">
           
            <p>
            <label for="">Name:</label>
            <input type="text" name="providername" id="" placeholder="Enter the Name" required/ >
            </p>

            <p>
            <label for="">Email:</label>
            <input type="email" name="provideremail" id="" placeholder="Enter the Correct Email" required/ >
            </p>

            <p>
            <label for="">Contact NO:</label>
            <input type="text" name="cnumber" id="" placeholder="Enter the Contact NO" required/ >
            </p>

            <p>
            <label for="">Location:</label>
            <input type="text" name="location" id="" placeholder="Enter the Company Location" required/ >
            </p>

            <p>
            <label for="">&nbsp;</label>
            <input type="submit" name="submit" value="Register"/>
            </p>




        </form>
</main>
</body>
</html>