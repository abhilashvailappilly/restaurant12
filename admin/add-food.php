<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>ADD FOOD</h1><br><br>
<br><br>
<?php
 if(isset($_SESSION['upload']))
 {
     echo $_SESSION['upload'];
     unset($_SESSION['upload']);
 }
 ?>
<form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Tittle</td>
                <td>
                    <input type="text" name="tittle" placeholder="add title">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" placeholder="add description"></textarea>
                </td>

            </tr>
            <tr>
                <td>Price</td>
                <td>
                    <input type="number" name="price">
                </td>

            </tr>
            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Category ID</td>
                <td>
                    <select name="category" id="">
                        <?php
                            //php to diaplay category from data base
                            $sql="SELECT * FROM category WHERE active='Yes'";

                            $res =mysqli_query($conn,$sql);

                            //counting rows to check wheather we have category
                            $count =mysqli_num_rows($res);

                            if($count>0){
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id=$row['id'];
                                    $tittle=$row['tittle'];
                                    
                                    ?>
                                     <option value="<?php echo $id;?>"><?php echo $tittle;?></option>

                                    <?php

                                }

                            }else{
                                ?>
                                    <option value="0">no category</option>
                                    <?php
                            }
                        ?>
                      
                    </select>
                   
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
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">

                </td>
            </tr>
        </table>
    </form>
    <?php
     if(isset($_POST['submit'])){
        //add the food to ndatabase
        
        //1.get the data from form
        $tittle=$_POST['tittle'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];

        //check wheather radio button clicked
        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];

        }else{
            $featured="No";
        }
        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
        }else{
            $active="No";
        }

        //2.upload image
        //wheatherr the select image is clicked or not and upload the image only if is selected
        if(isset($_FILES['image']['name']))
        {
            //Get the details of the selected image
            $image_name=$_FILES['image']['name'];
            //check wheather the image is selected or not and upload image only if selected
            if($image_name!="")
            {
                //rename image
                $ext=end(explode('.',$image_name));
                //new name of image
                $image_name="Food-Name-".rand(0000,9999).".".$ext;

                //upload image
                //Get the src path and destination


                $src=$_FILES['image']['tmp_name'];
                $dst="../images/food/".$image_name;
                $upload=move_uploaded_file($src,$dst);

                //check image uploaded or not
                if($upload==false)
                {
                    $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                    die();
                }
            }
        }else{
            $image_name="";
        }

        //3.insert to database
    
        //create a sql query to save or add food
        $sql2="INSERT INTO food SET                                        
        tittle='$tittle',
        description='$description',
        price=$price,
        image_name='$image_name',
        category_id=$category,
        featured='$featured',
        active='$active'
        ";

        //execute the query
        $res2=mysqli_query($conn,$sql2);
        if($res2==true)
        {
            $_SESSION['add']="<div class='sucess'>Food Added Sucessfully.</div> ";
            header('location:'.SITEURL.'admin/manage-food.php');

        }
        else
        {
            $_SESSION['add']="<div class='error'>Failed to add food.</div> ";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        //4.redirect with message
     }
    ?>

    </div>
</div>




<?php include('partials/footer.php'); ?>