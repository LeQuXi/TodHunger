<?php

include('../config/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res =mysqli_query($conn, $sql);

if($res==true)
{
    
    $_SESSION['delete'] ="Admin destroyed";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "Failed";
    header('location:'.SITEURL.'admin/manage-admin.php');
}








?>