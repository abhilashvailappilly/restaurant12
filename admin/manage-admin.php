<?php include('partials/menu.php');?>

    <!--Main content section -->
        <div class="main-content">
         <div class="wrapper">
            <h1>Manage admin</h1><br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//to display message
                    unset($_SESSION['add']);//for removing message
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];//to display message
                    unset($_SESSION['delete']);//for removing message
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];//to display message
                    unset($_SESSION['update']);//for removing message
                }


            ?>
            <br><br>

            <!--button to add admin-->
            <a href="add-admin.php" class="btn-primary">Add admin</a><br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>s.n</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>

                </tr>

                <?php
                        $sql= "SELECT * FROM admin ";
                        //execute the query
                        $res =mysqli_query($conn,$sql);
                        //check wheather the query is executed
                        if($res==TRUE)
                        {
                            //count rows to check wheather we have data in databaase or not
                            $count  = mysqli_num_rows($res);//function to get all rows in database

                            $sn=1;//variable
                            //checking
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //to get all the data

                                    //get individual data
                                    $id=$rows['id'];
                                    $fullname=$rows['fullname'];
                                    $username=$rows['username'];

                                    //display the values in the table
                                    ?>
                                     <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $fullname;?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">update admin</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">delete admin</a> 
                                        </td>

                                    
                                    <?php
                                }

                            }
                            else{

                            }
                        }
                ?>



                
            </table>


          </div>
        </div>
    <!-- main content section ends-->

   <?php include('partials/footer.php');?>



  </body>

</html