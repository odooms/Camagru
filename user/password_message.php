<?php
session_start();
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
<h1>Forgot Password</h1>
<?php
if ($_SESSION["forgot"]) {
    echo $_SESSION["forgot"];
}
$_SESSION["forgot"] = null;
?>
<form  role = "form" action= "login_system.php" <?php htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
<input class = "email" type= "userEmail" placeholder = "Enter email to reset your password" name = "email" />
<button type="reset_password" name="">Reset my password</button>
<br>
<p><a href= "login.php">Back to the login</a></p>
<a href= "registration.php" type = "signup"> Don't have account sign up</a></p>
</form>
<div><?php echo $error;?></div>
</div>
</body>
</head>
</html>