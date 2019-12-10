<?php
session_start();
$_SESSION['updatePasswdNeedEmail'] = $_POST['email'];
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
if ($_SESSION["error"]) {
    echo $_SESSION["error"];
}
$_SESSION["error"] = null;
?>
<form role = "form" action= "reset_password.php" <?php htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
<input class = "email" type= "userEmail" placeholder = "Enter email to reset your password" name = "email" />
<button type="submit" name="reset_password">Reset my password</button>

<br>
<p><a href= "login.php">Back to the login</a></p>
<a href= "registration.php" type = "signup"> Don't have account sign up</a></p>
</form>
<div><?php echo $error;?></div>
</div>
</body>
</head>
</html>