<?php


if(!isset($_SESSION['user'])){
    $_SESSION['not-logged-in']="Please login";
    header('Location:'.SITEURL.'admin/login.php');
}


?>