<?php
include("session.php");
include("database.php");
$username =$_SESSION['username'];

$upmail=$_POST['email'];
$sql = "UPDATE users SET email ='$upmail' WHERE username='$username'";

$p=mysqli_query($con,$sql);
if($p)
{
echo " <script type='text/javascript'>window.history.back(); </script> ";
}

	 
?>
