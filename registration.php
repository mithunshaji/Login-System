<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
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
<?php
    require('database.php');
    
    if (isset($_REQUEST['username'])) {
        
        $username = stripslashes($_REQUEST['username']);
        
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $sql    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '$password', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $sql);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">New user Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br><br>
        <input type="text" class="login-input" name="email" placeholder="Email Address"><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"><br><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link" style="border:3px; border-style: solid; border-color: black; padding: 1em; width: 350px; ">Already have an account? <a href="index.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
