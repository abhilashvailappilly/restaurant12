<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1> Update admin</h1><br><br>

    <?php
        $id=$_GET['id'];
        $sql="SELECT * FROM admin WHERE id=$id";
        $res=mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);

                $fullname=$row['fullname'];
                $username=$row['username'];
            }
            else{
                header('location:'.SITEURL.'admin/manage-admin.php');
            }

        }
    ?>

    <form action="" method="POST">
    <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" value="<?php echo $fullname;?>"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                </td>
            </tr>
        </table>



    </form>
    </div>


</div>
<?php
    if(isset($_POST['submit']))
    {
       //GEt values from form to update 
       $id=$_POST['id'];
       $fullname=$_POST['fullname'];
       $username=$_POST['username'];
       $password=$_POST['password'];
       //sql query to update admin
       $sql="UPDATE admin SET
       fullname='$fullname',
       username='$username',
       password='$password'
       WHERE id='$id'
       ";
       $res =mysqli_query($conn,$sql);

       if($res==true){
        $_SESSION['update']="Admin Updated Sucessfully";
        header('location:'.SITEURL.'admin/manage-admin.php');
       }else{
        $_SESSION['update']="Failed to Updated Admin";
        header('location:'.SITEURL.'admin/manage-admin.php');
       }
    }
?>



<?php include('partials/footer.php');?>