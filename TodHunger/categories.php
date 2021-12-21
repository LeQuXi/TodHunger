
<?php
include('partials-front/menu.php');
?>
 



    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>


            <?php
            $sql="SELECT * FROM tbl_category WHERE active='Yes'";

            $res=mysqli_query($conn, $sql);

            $count=mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id =$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                            <a href="category-products.php">
                                    <div class="box-3 float-container">
                                        <?php
                                        if($image_name==""){
                                            echo "errorDB";

                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Food" class="img-responsive img-curve">

                                            


                                            
                                            <?php
                                            
                                            

                                        }
                                        
                                        ?>

                                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                    </div>
                                </a>


                    <?php


                }

            }
            else{

            }

            
            
            
            ?>

      
         

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

 
<?php
include('partials-front/footer.php');
?>
 
