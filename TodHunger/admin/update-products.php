<?php include('partials/menu.php'); ?>


<?php 
if(isset($_GET['id']))
{

    $id=$_GET['id'];
    $sql2 = "SELECT * FROM tbl_product WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row2= mysqli_fetch_assoc($res2);

    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
}
else{
    header('location:'.SITEURL.'admin/manage-products.php');
}

?>





<div class="main-content">
    <div class="wrapper">
        <h1>Update product</h1>
        <br /><br />
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">  
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description"><?php echo $description?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                    <input type="number" name="price" value="<?php echo $price;?>">  

                    </td>
                </tr>
                <tr>
                    <td>Current image:</td>
                    <td>
                         <?php
                         if($current_image ==""){

                            echo "<div class='error'>no image</div>";
                         }
                         else{
                            ?>

                            <img src="<?php echo SITEURL;?>images/products/<?php $current_image;?>">
                            <?php
                            
                         }
                        
                         
                         
                         ?>



                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">


                        <?php
                        
                        $sql ="SELECT * FROM tbl_category  WHERE active='Yes'";
                        $res=mysqli_query($conn, $sql);

                        $count=mysqli_num_rows($res);

                         if($count>0){

                             while($row=mysqli_fetch_assoc($res)){
                                 $category_title=$row['title'];
                                 $category_id =$row['id'];

                                 //echo "<option valu='$category_id'>$category_title</option>";
                                 ?>
                                 <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo$category_title;?></option>

                                 <?php
                                

                             }

                         }
                         else{
                            echo "<option value='0'> Catgegory not avaliable.</option>";

                         }
                       
                        
                        
                        ?>
                            <option value="">Test</option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes" ){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input  <?php if($featured=="No" ){echo "checked";}?> type="radio" name="featured" value="No">No

                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes" ){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input  <?php if($active=="No" ){echo "checked";}?>type="radio" name="active" value="No">No

                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Save changes" class="btn-secondary">
                    </td>
                </tr>

                

                

            </table>







        </form>



           

              
    </div>
    
</div>

<?php include('partials/footer.php'); ?>