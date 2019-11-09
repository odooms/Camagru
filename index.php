<?php 
//include('session.php');
?>
<html>
<head>
<meta charset= "utf-8">
<link rel="stylesheet" type="text/css" href="user/style/style.css">
</head>
<body>
<header>
<table style="width:100%">
<tr>
<th><h1>Camagru</h1></th>
</table>
<?php if ($_SESSION["error"]) {echo $_SESSION["error"];}$_SESSION["error"] = null;?>
</header>
<section>
<nav>
<table>
<tr>
<th><td><h2><a href="user/login.php">Login</a></h2></td></th> 
</tr>
<tr>
<th><td><h2><a href="user/registration.php">Sign Up</a></h2></td></th>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
</table>
</nav>
<article>
<p></p>
</article>
</section>
<footer>
<p></p>
</footer>
</body>
</head>
</html>