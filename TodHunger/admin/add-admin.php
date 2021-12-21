<?php include('partials/menu.php')?>
<div class="mian-content">
    <div calss="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php 
         if(isset($_SESSION['add'])){
             echo $_SESSION['add'];
             unset($_SESSION['add']);
         }
         ?>

        <form action="" method="POST">
            
        <table class="tbl-30">
            <tr>
            <td>Full name</td>
            <td ><input type="text" name="full_name" placeholder="Enter "></td>
            </tr>

            <tr>
            <td>Username</td>
            <td ><input type="text" name="username" placeholder=""></td>
            </tr>
            
            <tr>
            <td>Password</td>
            <td ><input type="password" name="password" placeholder=""></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>



        </form>
    </div>
</div>
<?php include('partials/footer.php')?>

<?php

        // process the data

        if(isset($_POST['submit'])){
            
            $full_name =$_POST['full_name'];
            $username =$_POST['username'];
            $password =md5($_POST['password']);
            
            $sql ="INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
            ";
                
                //save data
                $res =mysqli_query($conn, $sql) or die(mysqli_error());


                if($res==TRUE){
                    // echo"Data saved";
                    $_SESSION['add']= "Admin added";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
                else{
                    // echo"Failed to save";
                    $_SESSION['add']= "Failed to added";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
        }
      


?>