<?php include('partials-kitchen/kitchenmenu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add kitchen supervisor</h1><br><br>

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
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="enter your username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="enter your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add" class="btn-secondary">
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
     $username=$_POST['username'];
     $password=$_POST['password'];
     // $password=md5($_POST['password']);

     //query to save data to database
     $sql="INSERT INTO kitchenadmin SET
            username='$username',
            password='$password'
            ";

       
           
            //executing query and save data into database
           $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

          // check wheather the query is executed or not and display message
          if($res==TRUE)
          {
                //echo "data entered sucessfully";
                $_SESSION['add']=" Added Sucessfully";
                //redirect page to manage admin
                header("location:".SITEURL.'admin/manage-kitchen.php');
          }
          else{
           // echo "failed to insert data";
           $_SESSION['add']="Failed to add";
           //redirect page to manage admin
           header("location:".SITEURL.'kitchen/manage-kitchen.php');
          }


   }
  
    

?>


<?php include('partials-kitchen/kitchenfooter.php');?>
 
