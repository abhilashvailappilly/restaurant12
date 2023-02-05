<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Food</h1><br><br>

     <!--button to add admin-->
     <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add food</a><br><br><br>

     <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>

<table class="tbl-full">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action </th>

    </tr>
    <?php
        //create a sql query to get all the food
        $sql ="SELECT * FROM food ";
        $res=mysqli_query($conn,$sql);
        $count =mysqli_num_rows($res);

        //variable
        $sn=1;

        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id=$row['id'];
                $tittle=$row['tittle'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
                ?>
             <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $tittle;?></td>
                <td><?php echo $price;?></td>
               
                <td>
                    <?php
                    //iamge availabale or not
                    if($image_name!=""){
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
                            <?php
                    }else{
                        echo "<div class='error'>No image Added.</div>";
                    }
                    ?>
               </td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/delete-food.php" class="btn-secondary">update Food</a>
                    <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">delete Food</a> 
                </td>
            </tr>
                <?php
            }

        }else{
            echo " <tr> <td colspan='7' class='error'>Food Not Added Yet.</td></tr> ";
        }
    ?>
   
    
</table>
    </div>

</div>

<?php include('partials/footer.php');?>

