
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
<h1>New Password</h1>
<?php
if ($_SESSION["error"]) {
    echo $_SESSION["error"];
}
$_SESSION["error"] = null;
?>
<form role = "form" action= "new_password.php" <?php htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
<input class = new_passd type= "userEmail" placeholder = "New password" name = "New_passd" />
<br>
<input class = new_passd type= "userEmail" placeholder = " Confirm New password" name = "confirm_new_passd" />
<button type="submit" name="new_password">submit</button>

<br>
<p><a href= "login.php">Back to the login</a></p>
<a href= "registration.php" type = "signup"> Don't have account sign up</a></p>
</form>
<div><?php echo $error;?></div>
</div>
</body>
</head>
</html>