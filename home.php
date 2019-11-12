<?php 
session_start();
?>
<html>
<head>
<meta charset= "utf-8">
<meta name = "viewport" content = "width=device-width, intial-scale=1">
<link rel="stylesheet" type="text/css" href="user/style/home.css">
</head>
<body>

<header>
<table style="width:100%">
<tr>
<th><h1>Camagru</h1></th>
</tr>
</table>
</header>

<section>
<nav>
<table >
<tr>
<th><h2>
<h2></th>
</tr>
<tr>
<th><h2><a href="index.php">Log out</a></h2></th>
</tr>
<tr>
<th><h2><a>account</a></h2></th>
</tr>
<tr>
<th></th>
</tr>
</table>
</nav>


<article>
<div id="vid-canvas"></div>

</article>
</section>


<footer>
<input id= "vid-take" type= "button" value= "Take Photo">
<!--<form action="upload.php" method= "post" enctype= "multipart/form-data">
<input type= "file" name = "file">
<button type= "submit" name = "submit_login">UPLOAD</button>-->
</footer>

<video id="vid-show" autoplay></video></body>
<script src="js/webcam.js"></script>
</html>
