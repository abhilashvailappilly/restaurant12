<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Add Category</h1><br><br>

    <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
    ?>
    <br><br>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Tittle</td>
                <td>
                    <input type="text" name="tittle" placeholder="add title">
                </td>
            </tr>
            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Featured</td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add category" class="btn-secondary">

                </td>
            </tr>
        </table>
    </form>

    <?php
        if(isset($_POST['submit']))
        {
           $tittle=$_POST['tittle'];
           if(isset($_POST['featured']))
           {
                $featured = $_POST['featured'];
           }
           else{
                $featured="No";
           }
           if(isset($_POST['active']))
           {
            $active=$_POST['active'];

           }
           else{
            $active="No";
           }
           //to chech wheatherr image is selcted or not
           //print_r($_FILES['image']);
          // die();
          if(isset($_FILES['image']['name']))
          {
            $image_name=$_FILES['image']['name'];
            //auto rename our image
            //get the extension of our image
            $ext=end(explode('.',$image_name));
            //rename the image
            $image_name="Food_Category_".rand(000,999).'.'.$ext;

            $source_path =$_FILES['image']['tmp_name'];

            $destination_path="../images/category/".$image_name;

            $upload = move_uploaded_file($source_path,$destination_path);

            //check wheather the image is uploaded
            if($upload==false)
            {
                $_SESSION['upload']="<div class='error'>Failed to Upload Images.</div>";
                header('location:'.SITEURL.'admin/add-category.php');
                die();


            }
          }else{
            $image_name="";
          }


           //sql query to insert category into database
           $sql ="INSERT INTO category SET
           tittle='$tittle',
           image_name='$image_name',
           featured='$featured',
           active='$active'
           ";

           $res=mysqli_query($conn,$sql);
           if($res==true)
           {
            $_SESSION['add'] = "<div class='sucess'> Category Added Sucessfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');

           }
           else
           {
            $_SESSION['add'] = "<div class='error'> Failed to Add category.</div>";
            header('location:'.SITEURL.'admin/add-category.php');
           }



        }
        ?>

    </div>
</div>










<?php include('partials/footer.php'); ?>