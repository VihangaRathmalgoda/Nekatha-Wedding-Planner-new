<?php
session_start();
$_SESSION=array();
//session destroy
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-86400,'/');
}
session_destroy();
header('Location: main.php?logout=yes');
?>
