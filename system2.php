<?php
include("session.php");
include("database.php");
$username =$_SESSION['username'];

$uppass=$_POST['password'];
$sql="UPDATE users SET password='$uppass' WHERE username='$username'";
$q=mysqli_query($con,$sql);
if($q)
{
echo " <script type='text/javascript'>window.history.back(); </script> ";
}
	 
?>
