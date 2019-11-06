<?php
session_start();
//require_once("/goinfre/odooms/Desktop/MAMP/apache2/htdocs/camagru/configuration/setup.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset= "utf-8">
<link rel="stylesheet" type="text/css" href="Camagru.css">
<body>
<div class= "header">
<a href="../index.php">HOME PAGE</a>
</div>
<div class = "wrap">
<h1>Login</h1>
<?php
if ($_SESSION["error"]) {
    echo $_SESSION["error"];
}
$_SESSION["error"] = null;
?>
<form  role = "form" action= "login_system.php" <?php htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
<input class = "uname" type= "username" placeholder = "Enter your email" name = "email" />
<span class = "error"><?php if (isset($EmailERROR)) echo $EmailERROR ?> </span>
<input class = "pwd" type= "password" placeholder = "Enter your Password" name= "pword" />
<span class = "error"><?php if (isset($PwordERROR)) echo $PwordERROR ?> </span>
<button type="submit" name="login">Login</button>
<br>
<a href= "#" type = "forget"> Forget your password</a>
<br>
<a href= "registration.php" type = "signup"> Don't have account sign up</a></p>
</form>
<div><?php echo $error;?></div>
</div>
</body>
</head>
</html>