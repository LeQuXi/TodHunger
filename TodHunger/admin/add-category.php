<?php include('partials/menu.php');?>


<div clss="main-content">
<div class="wrapper">
    <h1>Add Category</h1>
    <br><br>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    
    ?>
    <br><br>


    <!-- add catg form -->
        <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="category title">
                </td>
            </tr>
            <tr>
                <td>Select image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
            </tr>
        </table> 

    </form>
    
    <?php
    if(isset($_POST['submit'])){
        //echo "clicked";
        $title=$_POST['title'];

        if(isset($_POST['featured'])){
            $feature =$_POST['featured'];
        }
        else{
            $feature="No";
        }

        if(isset($_POST['active'])){
            $active = $_POST['active'];

        }
        else{
            $active="NO";
        }
        // print_r($_FILES['image']);
        
        // die();

        if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];
            // $ext=end(explode('.',$image_name));

            // $image_name="res_cat_".rand(000, 999).'.'.$ext;


            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name; //images\category

            $upload = move_uploaded_file($source_path, $destination_path);
            if($upload==false){
                $_SESSION['upload'] = "error(failed to upload)";
                header('location'.SITEURL.'admin/add-category.php');
                die();
            
        }
            

        }
        else{
                $image_name="";
        }

        $sql = "INSERT INTO tbl_category SET 
            title='$title',
            image_name='$image_name',
            featured='$feature',
            active='$active'
        ";

        $res = mysqli_query($conn,$sql);

        if($res ==True){
                $_SESSION['add'] = "Category add";
                header("location:".SITEURL.'admin/manage-category.php');
        }
        else{
            $_SESSION['add'] = "Failed";
            header('loaction'.SITEURL.'admin/add-category.php');
        }








    }
    
    ?>
    <!-- add catg form -->
    </div>
</div>


<?php include('partials/footer.php');?>