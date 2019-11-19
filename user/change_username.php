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
<h1>New username</h1>
<?php
if ($_SESSION["error"]) {
    echo $_SESSION["error"];
}
$_SESSION["error"] = null;
?>
<form role = "form" action= ".php" <?php htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
<input class = "uname" type= "text" placeholder = "Enter your new username" name = "new_uname" />
<button type="submit" name="reset_password">update account</button>

<br>
<p><a href= "login.php">Back to the login</a></p>
</form>
<div><?php echo $error;?></div>
</div>
</body>
</head>
</html>