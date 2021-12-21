<?php

include('../config/constants.php');

//
if(isset($_GET['id'])&& isset($_GET['image_name'])){    

    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name != ""){
        $path="../images/products/".$image_name;
        $remove =unlink($path);

        if($remove ==false){
            $_SESSION['upload'] = "<div class='error'>Operation Failed</div>";
            header('loaction:'.SITEURL.'admin/manage-products.php');
            die();

        }
     }

    $sql ="DELETE FROM tbl_product WHERE id=$id";
    $res=mysqli_query($conn, $sql);

    if($res==true){
        $_SESSION['delete'] ="<div calss='error'>Product deleted</div>";
        header('location:'.SITEURL.'admin/manage-products.php');

    }
    else{
        $_SESSION['delete'] ="<div calss='error'>Operation failed</div>";
        header('location:'.SITEURL.'admin/manage-products.php');  
    }


}
else{



    $_SESSION['unauthorize']= "<div calss='error'>Unauhoritized Access.</div>";
    header('location:'.SITEURL.'admin/manage-products.php');
}

?>