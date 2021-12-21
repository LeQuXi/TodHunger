
<?php
include('partials-front/menu.php');
?>
<?php 
if(isset($_GET['food_id']))
{
    $food_id=$_GET['food_id'];
    $sql = "SELECT * FROM tbl_product WHERE id=$food_id";
    $res=mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);
        $title =$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];


    }
    else {
        header('location'.SITEURL);

    }
}

else{
    header('location:'.SITEURL);

}
?>
 

    <section class="food-search">

        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Product</legend>

                    <div class="food-menu-img">
                        <?php
                            if($image_name==""){
                                echo "error";
                            }
                            else{
                                ?>
                                <img src="<?php echo SITEURL;?>images/products/<?php echo $image_name; ?>" class ="img-responsive img-curve">
                                <?php

                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="product-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <p class="product-price">$<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">


                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder=" +370xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="lalal@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="street1, door number 1b" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['submit'])){

                $food = $_POST['food'];
                $price=$_POST['price'];
                $quantity=$_POST['quantity'];
                $total=$price*$quantity;
                $order_date =date("Y-m-d h:i:sa");
                $status="Ordered";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];
                $user_id =$_SESSION['user_id'];


               


                $sql2="INSERT INTO tbö_order SET
                food='$food',
                price='$price',
                quantity =$quantity,
                total='$total',
                order_date='$order_date',
                status ='$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email='$customer_email',
                customer_address='$customer_address',
                user_id=$user_id

                
                ";

                    $res2=mysqli_query($conn,$sql2);
                    if($res2 ==true){
                        $_SESSION['order'] ="<div class='success'>Ordered Successfuly</div>";
                        header('location:'.SITEURL);


                    }
                    else{
                        $_SESSION['order'] ="<div class='error'>Failed</div>";
                        header('location:'.SITEURL);

                    }



            }

            
            
            ?>



        </div>
    </section>
    



  
<?php
include('partials-front/footer.php');
?>
