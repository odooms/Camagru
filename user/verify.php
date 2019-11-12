<?php
session_start();
include_once("../config/setup.php");
	$U_Email = $_GET['email'];
	echo $U_Email;
    try{
        //$conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'database connected';
        $query = "UPDATE users SET verified = :verified WHERE email = :email";

        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            'verified' => 1,
            'email' => $U_Email
            )
		);
		echo "UPDATED";
        //echo $stmt->rowCount(). 'records updated';
    }
    catch(PDOException $error)
    {
        $error->getMessage();
    }
?>
<html>
<head>
<meta charset= "utf-8">
<link rel="stylesheet" type="text/css" href="user/style/style.css">
</head>
<body>
</body>
</head>
</html>
