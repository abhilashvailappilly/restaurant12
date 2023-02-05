<?php

// innclude constant file
include('../config/constants.php');
    //1.get the ID of admin to deleted
    echo $id=$_GET['id'];

    //2. create sql query to delete admin
    $sql = "DELETE FROM admin WHERE id=$id";

    //executr query
    $res=mysqli_query($conn,$sql);

    //check wheather the query executed sucessfully
    if($res==true)
    {
        //echo "Admin Deleted";
        $_SESSION['delete']="<div class='sucess'>Admin Deleted Sucessfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
      //  echo"Failed to delete Admin";
      $_SESSION['delete']="<div class='error'>Failed to Delete Admin Sucessfully.</div>";
      header('location:'.SITEURL.'admin/manage-admin.php');

    }

    //3.redirect to manage admin page with message.
?>