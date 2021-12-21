
<?php
include('partials-front/menu.php');
?>
 

    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>


            <?php
            print_r($_SESSION);

            $sql2 = "SELECT * FROM tbl_product";
            $res2 = mysqli_query($conn, $sql2);
            $count= mysqli_num_rows($res2);

            if($count>0){
                while($row=mysqli_fetch_assoc($res2)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description =$row['description'];
                    $image_name=$row['image_name'];
                    ?>
                        <div class="product-menu-box">
                                    <div class="product-menu-img">
                                        <?php
                                        if($image_name==""){
                                            echo"error";

                                        }
                                        else
                                        {
                                        ?>
                                        <img src="<?php echo SITEURL;  ?>images/products/<?php echo$image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php

                                        }
                                        
                                        
                                        
                                        ?>
                                    </div>

                                    <div class="product-menu-desc">
                                        <h4><?php echo $title; ?></h4>
                                        <p class="product-price">$<?php echo $price; ?></p>
                                        <p class="product-detail"><?php echo $description; ?></p>
                                        <br>

                                        <a href="<?php echo SITEURL?>order.php?food_id=<?php echo $id;?> " class="btn btn-primary">Order</a>
                                    </div>
                        </div>
                        


                    <?php


                }




            }
            else{
                echo "error";
            }


            
            
            
            
            ?>

           

            

        </div>

    </section>

  


    <?php
include('partials-front/footer.php');
?>
 
