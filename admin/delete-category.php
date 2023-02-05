<?php

include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
   $id=$_GET['id'];
   $image_name=$_GET['image_name'];

   if($image_name!="")
   {
    $path ="../images/category/".$image_name;
    $remove=unlink($path);

    if($remove==false)
    {
        $_SESSION['remove'] ="<div class='error'> Failed to Remove  category Image. </div>";
        header('location:'.SITEURL.'admin/manage-category.php');
        die();
    }
   }
   //to delete daata from data base
   $sql="DELETE FROM category WHERE id=$id";
   //execute querty
   $res=mysqli_query($conn,$sql);

   if($res==true)
   {
    $_SESSION['delete']="<div class='sucess'> Category Deleted Sucessfully.</div>";
    header('location:'.SITEURL.'admin/manage-category.php');

   }
   else{
    $_SESSION['delete']="<div class='error'> Failed to remove Category.</div>";
    header('location:'.SITEURL.'admin/manage-category.php');

   }
}
else{
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>