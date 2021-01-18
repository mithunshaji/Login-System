<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login Page</title>
    <link rel="stylesheet" href="mystyle.css"/>
</head>
<style>
body {
  background-image: url('https://unblast.com/wp-content/uploads/2020/05/Light-Wood-Background-Texture.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  }
</style>
<body>
<?php
    require('database.php');
    session_start();
    
   
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
   	
        $sqlquery    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
      
        $result = mysqli_query($con, $sqlquery) or die(mysql_error());
        $r = mysqli_num_rows($result);
        if ($r == 1) {
            $_SESSION['username'] = $username;
          
            header("Location: home.php");
        } else 
        {
            echo "<div class='form'>
                  <h2>Incorrect Username/password.</h><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a>.</p>
                  </div>";
        }
    } else {  
?>
    
    <form class="form" method="post" name="login">
        <h1 class="login">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        
        <p class="link" style="border:3px; border-style: solid; border-color:black; padding: 1em; width: 400px; ">
        <q style="font-size: 25px; color: darkred; " > New user: </q> <a href="registration.php"> <r style="font-size: 24px">  Registration Now</r></a></p>
  </form>
<?php
    }
    $cookie_name = "login";
	$cookie_value = '$email';
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

?>
</body>
</html>
