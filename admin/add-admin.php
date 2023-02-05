<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add admin</h1><br><br>

    <?php
          if(isset($_SESSION['add']))//check the session add or no
          {
              echo $_SESSION['add'];//to display message
              unset($_SESSION['add']);//for removing message
          }

    ?>

    <form action=" " method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" placeholder="enter your name"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="enter your username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="enter your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>

    </div>

</div>
<?php 
    //processing value from form and save to database
    //check whether the submit button is clicked or not

   if(isset($_POST['submit']))
   {
     $fullname=$_POST['fullname'];
     $username=$_POST['username'];
     $password=$_POST['password'];
     // $password=md5($_POST['password']);

     //query to save data to database
     $sql="INSERT INTO admin SET
            fullname='$fullname',
            username='$username',
            password='$password'
            ";

       
           
            //executing query and save data into database
           $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

          // check wheather the query is executed or not and display message
          if($res==TRUE)
          {
                //echo "data entered sucessfully";
                $_SESSION['add']="Admin Added Sucessfully";
                //redirect page to manage admin
                header("location:".SITEURL.'admin/manage-admin.php');
          }
          else{
           // echo "failed to insert data";
           $_SESSION['add']="Failed to add admin";
           //redirect page to manage admin
           header("location:".SITEURL.'admin/add-admin.php');
          }


   }
  
    

?>


<?php include('partials/footer.php');?>
 
