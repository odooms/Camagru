<html>
<head>
<title>Image gallery</title>
</head>
<body>
<main>
<?php
$dir = glob('uploads/(*.jpg, *.png)',GLOB_BRACE);
foreach($dir as $value)
?>
</main>
</body>
</html>
