<?php
include("session.php");
include("database.php");
$username =$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blogx</title>
    <link rel="stylesheet" href="mystyle.css" />
</head>
<style>
body {
  background-image: url('https://media.pixcove.com/B/4/3/Background-Contextual-Textures-Backgrounds-Pastel--9759.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  }
</style>
<body>
<header>
	<h2>
		<?php 
		echo "Welcome " . "  " .$_SESSION['username'];
		?>
	</h2>
	<div class = "window">
		<button><a href="profile.php">profile</a></button>
		<button><a href="search.php">search</a></button>
		<button><a href="logout.php"> logout</a></button>
		
	</div>
	</header>
    <div class="wrapper">
       
        <p><b>Welcome to the blog - Post your stories</b></p>
    </div>
    <div class = "msgbox">
	<form method="post">
		
			
			<textarea rows="10" cols="80" name="status" placeholder="Enter the status"> </textarea>
			
				<input type="submit" name="submit" value="submit"> 
			
	</form>
</div>
<br><br></br></br>
<?php 

	if (isset($_POST['submit']))
	 {
	 	$msg=$_POST['status'];
	 	if ($msg != "NULL") {
	 	 $sql="insert into msgcloud(username,msg)values('$username','$msg')";
	    $q=mysqli_query($con,$sql);
	 
	   }}

?>
<div class = "status">
	<?php
	$command = "SELECT * FROM `msgcloud` WHERE `username` = '$username'" ;
	$result = $con->query($command);
	   
if (mysqli_num_rows($result) > 0) {
	$i=0;
while($row = mysqli_fetch_array($result)) {	
 
 ?>

  <div class= "area">
 <?php

    $name=$row['username'];
    $msgs=$row['msg'];  
    echo '<p style="border:3px; border-style:solid; border-color:black; padding: 1em; "><q style="color:green; ">'.$name.'</q>:-';
    
    echo ''.$msgs.'</p>';
    
    ?>
    <?php
$i++;

}
}
?></div>
    </div>
</body>
</html>
