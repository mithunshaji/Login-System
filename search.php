<?php
session_start();
include ("session.php");
include("database.php");
$username =$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title> Search users
	</title>
	   <link rel="stylesheet" href="mystyle.css"/>
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
<br><br>
<center>
	<td><p style="font-size: 25px; color: black; ">Search user :</td></p>
	<form method="GET" >
		<table>
			
			<tr>
			<input type="text" name="search"><br></br>
				<th colspan="2"><input type="submit" name="submit" value="search"></th>
			</tr>
		</table>
	</form>
</center>
<?php 

	if (isset($_GET['search']))
	 {
	 	$name=$_GET['search'];
		
	     $sql="SELECT * FROM users WHERE username LIKE '%$name%';";
	    $res=mysqli_query($con,$sql);
	  
	    if ($res) {
	    echo " Search results for '$name' : </p>" ;
	    }
	   ?>
	    <table>
 <?php
	   if (mysqli_num_rows($res) > 0) {
	$i=0;
while($row1 = mysqli_fetch_array($res)) {	
?>
<table>
	<tr>
		<td><p style="font-size: 25px; color: darkgreen; ">Username :</td></p>
		<td><?php echo '<p style="border:3px; border-style:solid; border-color:black; padding: 1em; ">'.$row1['username'].'</p>';?></td>
		 
        </form>
	</tr>
	<tr>
		<td><p style="font-size: 25px; color: darkgreen; ">Email-id :</td></p>
		<td><?php 
		$arr1=$array['email'];
		echo '<p style="border:3px; border-style:solid; border-color:black; padding: 1em; ">'.$row1['email'].'</p>';?></td>
		  
	</tr></table 

    <?php
$i++;
}
}
?>
	    </table>
	    <?php  	
	    } 
	 ?>
</body>
</html>
