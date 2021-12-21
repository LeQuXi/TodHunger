<?php
include('../config/constants.php');
?>

<html>
    <head>
        <title>Login - TodHunger</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">login</h1>

            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['not-logged-in'])){
                    echo   $_SESSION['not-logged-in'];
                    unset($_SESSION['not-logged-in']);
                }
            ?>
            <br><br>

                <!-- loginstratshere -->
                <form action="" method="POST" class="text-center">
            
            <table class="tbl-30">
                
                <tr>
                <td>Username</td>
                <td ><input type="text" name="name" placeholder="Enter"></td>
                </tr>
                
                <tr>
                <td>Password</td>
                <td ><input type="password" name="password" placeholder="Enter "></td>
                </tr>
    
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Login" class="btn-secondary">
                    </td>
                </tr>
            </table>
    
    
    
            </form>
                
                </div>        
    </body>
</html>

<?php

if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $password = md5($_POST['password']);
   $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
   $res = mysqli_query($conn, $sql);
   $counter = mysqli_num_rows($res);
   if($counter==1){
       $_SESSION['login']="Login successful";
       $_SESSION['user']=$username;
       header('location:'.SITEURL.'admin/index.php');
   }
   else{
       $_SESSION['login']="wrong credentials";
       header('location:'.SITEURL.'admin/login.php');
   }
}

?>