 <?php include('partials/menu.php')?> 



    <!-- main section -->
    <div class="main-content">
        <div class="wrapper">
         <h1>Manage admin</h1>
         <br /> <br />

         <?php 
         if(isset($_SESSION['add'])){
             echo $_SESSION['add'];
             unset($_SESSION['add']);
         }
         if(isset($_SESSION['delete'])){
             echo $_SESSION['delete'];
             unset($_SESSION['delete']);

         }
         ?>
          <br> <br><br>

         <!-- ButtonToAdd -->
         <a href="add-admin.php" class="btn-primary">Add Admin</a>
         <br />

         <table class=tbl-full>
             <tr>
             <th>S.N</th>
             <th>F.N</th>
             <th>Username</th>
             <th>Actions</th>

             </tr>


             <?php 
                $sql= "SELECT * FROM tbl_admin";
                $res=mysqli_query($conn,$sql);
                if($res==True){
                    $counter=mysqli_num_rows($res);
                    $sn=1;

                    if($counter>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];

                            ?>
                                
                                <tr>
                                <td><?php echo  $sn++?></td>
                                <td><?php  echo $full_name?></td>
                                <td><?php  echo $username?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete </a>
                                    
                                </td>
                                </tr>


                            <?php

                        }
                    }
                    else{

                    }
                }
             
             ?>


            
         </table>
         
        </div>
    </div>

     <!-- main section -->

    <!-- footer section -->
<?php
include 'partials/footer.php';
?>