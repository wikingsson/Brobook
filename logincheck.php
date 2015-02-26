<?php
if(!isset($_SESSION["status"])){
    header("location:wall.php");
}
else{
    header("loaction:login.php");
}

//Logout
if(isset($_POST["logout_submit"])){
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>