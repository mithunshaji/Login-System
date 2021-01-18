<?php

include("session.php");
include("database.php");
$username =$_SESSION['username'];


$sql="select * from users where username = '$username' ";
$q=mysqli_query($con,$sql);
$array=mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html>
<head>
	<title> profile page </title>
</head>

<body>
<style>
body {
  background-image: url('https://unblast.com/wp-content/uploads/2020/05/Light-Wood-Background-Texture.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  }
</style>
	<h1>Profile details</h1>
<table>
	<tr>
		<td><p style="font-size: 25px; color: darkgreen; ">Username :</td></p>
		<td><?php echo '<p style="border:3px; border-style:solid; border-color:black; padding: 1em; ">'.$array['username'].'</p>';?></td>
		 
        </form>
	</tr>
	<tr>
		<td><p style="font-size: 25px; color: darkgreen; ">Email-id :</td></p>
		<td><?php 
		$arr1=$array['email'];
		echo '<p style="border:3px; border-style:solid; border-color:black; padding: 1em; ">'.$arr1.'</p>';?></td>
		  <td>    <form method="POST" action="system1.php">
         <input type="text" name="email" placeholder="Change your email address">
        <button type="submit">Change</button>
        </form></td>
	</tr> 
	<tr>
		<td><p style="font-size: 25px; color: darkgreen; ">Password :</td></p>
		<td><?php
		$arr1=$array['password'];
		echo '<p style="border:3px; border-style:solid; border-color:black; padding: 1em; ">'.$arr1.'</p>';?></td>
		
		
  
       <td><form method="POST" action="system2.php">
         <input type="text" name="password" placeholder="Change your password">
        <button type="submit">Change</button>
        </form>        
	</td><td>
	<form method="POST" action="system3.php">
        
        <button type="submit">view</button></td></tr> 
</table>
	
    
</body>
</html>
