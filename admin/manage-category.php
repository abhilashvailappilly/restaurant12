<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage category</h1><br>

    <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
    ?>

    <br>

     <!--button to add admin-->
     <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add category</a><br><br><br>

<table class="tbl-full">
    <tr>
        <th>s.n</th>
        <th>Tittle</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    <?php
        $sql  ="SELECT * FROM category";

        $res=mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        //for seriaql no
        $sn=1;

        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id=$row['id'];
                $tittle=$row['tittle'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
                ?>
             <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $tittle;?></td>
                <td>
                    <?php
                    //iamge availabale or not
                    if($image_name!=""){
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
                            <?php
                    }else{
                        echo "<div class='error'>No image Added.</div>";
                    }
                    ?>
               </td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/delete-category.php" class="btn-secondary">update Category</a>
                    <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">delete Category</a> 
                </td>
            </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td><div class="error">No Category Added.</div></td>
            </tr>
            <?php
        }
    ?>
   
   
</table>
    </div>

</div>

<?php include('partials/footer.php');?>

