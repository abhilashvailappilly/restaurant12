<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Order</h1><br><br>

     <!--button to add admin-->
    
<table class="tbl-full">
    <tr>
        <th>s.n</th>
        <th>Name</th>
        <th>Table Number</th>
        <th>Payment Method</th>
        <th>Phone</th>
        <th>Items</th>
        <th>Price</th>
        <th>Action</th>

    </tr>
    <?php
    $sql="SELECT * FROM orders ORDER BY id DESC";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    $sn=1;
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            //get all the orderr details
            $id=$row['id'];
            $name=$row['name'];
            $table_no=$row['table_no'];
            $phone=$row['phone'];
            $method=$row['method'];
            $total_product=$row['total_product'];
            $total_price=$row['total_price'];
            ?>
                    <tr>
                <td><?php echo $sn++;?>.</td>
                <td><?php echo $name; ?></td>
                <td><?php echo $table_no; ?></td>
                <th><?php echo $phone; ?></th>
                <th><?php echo $method; ?></th>
                <th><?php echo $total_product; ?></th>
                <th><?php echo $total_price; ?></th>
                <td>
                    <a href="" class="btn-secondary">update order</a>
                    
                </td>
            </tr>
  

            <?php
        }
    }
    else{
        echo" <tr> <td colspan='12' class='error'>orders not available </td></tr>";
    }
    ?>
    
    
</table>
    </div>

</div>

<?php include('partials/footer.php');?>

