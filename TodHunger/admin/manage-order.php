<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
    <h1>manage order</h1>
    </div>
    <?php
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
    ?>
    <table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Food</th>
        <th>Price</th>
        <th>Qty.</th>
        <th>Total</th>
        <th>order Date</th>
        <th>status</th>
        <th>Customer Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Address</th>
        <th>Actions/th
    </tr>
    <?php
    $sql= "SELECT * FROM tbö_order ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows ($res);
    $sn=1;
    if($count>0){
        while($row=mysqli_fetch_assoc($res)){
            $id=$row['id'];
            $food = $row['food'];
            $price =$row['price'];
            $quantity = $row[ 'quantity'];
            $total = $row[ 'total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $customer_name = $row[ 'customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address= $row['customer_address'];
            $user_id= $row['user_id'];
       
            ?>

                <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $food;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $quantity;?></td>
                <td><?php echo $total;?></td>
                <td><?php echo $order_date;?></td>
                <td>
                    <?php 
                    if($status=="Ordered")
                    {
                    echo "<label >$status</label>";
                    }
                    elseif($status ==  "On delivery")
                    { 
                    echo "<label style='color:orange;'>$status</label>";  
                    }
                    elseif($status=="Delivered")
                    {
                    echo "<label style='color:green;'>$status</label>";
                    }
                
                ?>
                </td>

                <td><?php echo $customer_name;?></td>
                <td><?php echo $customer_contact;?></td>
                <td><?php echo $customer_email;?></td>
                <td><?php echo $customer_address;?></td>
                    <td>
                        <a href ="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>"class="btn-secondary">Update</a>
                    </td>
                </tr>

            
            <?php
        }
    }
    else{
        echo "<tr><td colspan='12'>Products not aveilabe</td></tr>";

    }
  
    
    ?>
    </table>
   

   
</div>


<?php include('partials/footer.php')?>