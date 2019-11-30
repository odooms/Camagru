<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../config/setup.php");
session_start();
//$email = $_SESSION['email'];
if(isset($_POST['submit']))
{
	$post_id = $_SESSION['login_user'];
	$comment = $_POST["comments"];
	$image_id = $_POST['image_id'];
	$user_id = $_POST['image_user'];
	
    try {
		$stmt = $conn->prepare("INSERT INTO comments (comment, image_id, user_id, post_id) VALUES  (:comment, :image_id, :user_id, :post_id)");// :image_id, user_id, :post_id)");
		$stmt->bindparam(":comment", $comment);
		$stmt->bindparam(":image_id", $image_id);
		$stmt->bindparam(":user_id", $user_id);
		$stmt->bindparam(":post_id", $post_id);
		$stmt->execute();

		$user_id = $_POST['image_user'];
		$tmp = $conn->prepare("SELECT email FROM users WHERE username = :username");
		$tmp->bindParam(':username', $user_id);
        $tmp->execute();
        $result = $tmp->fetch();
		//$_SESSION['user_id_email'] = $result[0];
		$user_id_email = $result[0];
		
		if($tmp){
			$to = $user_id_email;
			$subject = "New comment";
			echo $message = "
			<html>
			<head>
			<title>NEW COMMENT
			</title>
			</head>
			<body>
			<P>Someone just commented on your image</P>
			<a href='http://localhost:8080/Camagru/index.php'>
			Camagru</a>
			</body>
			</thml>";
			$header = "From: odooms@student.wethinkcode.co.za \r\n";
			$header = "MIME-Version: 1.0" . "\r\n";
			$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to, $subject,$message,$header);
			header("Location: ../home.php");
			return ;
		}else
		{
			echo "error";
		}
		header("Location: ../home.php");
		return ;
		
   	}
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
   
    
}
?>
