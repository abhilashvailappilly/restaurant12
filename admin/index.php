<?php
$server_name = 'localhost';
$user_name = 'root';
$user_password = '';
$database = 'restaurant';

$conn = new mysqli($server_name, $user_name, $user_password,$database);
if ($conn->connect_error) {
    die("cant connect" . $conn->connect_error);
}
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="select * from admin where username='".$username."' and password='".$password."'";
	$que=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($que);
	if($que==true && $row==true)
	{
		echo "<script>alert('login ok')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
		
	}
    else{
        echo "<script>alert('login failed')</script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin | Login</title>


   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>



<!-- admin login form section starts  -->

<section class="form-container">

<form name="f1" action="index.php" method="post">
      <h3>login now</h3>
     
      <div class="input-field">
            <input type="text" class="input box" placeholder="Username" name="username">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input box" placeholder="Password" name="password">
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit btn" value="Login" name="submit">
        </div>
   </form>

</section>

<!-- admin login form section ends -->











</body>
</html>