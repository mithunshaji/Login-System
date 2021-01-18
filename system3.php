<?php
include("session.php");
include("database.php");
$username =$_SESSION['username'];

$sql = "UPDATE users SET email ='admin22@gmail.com' WHERE username='$username'";

$p=mysqli_query($con,$sql);
if($p)
{
echo " <script type='text/javascript'>window.history.back(); </script> ";
}

	 
?>
