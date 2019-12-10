<?php
include_once("../config/setup.php");
session_start();
if(isset($_POST['like']))
{
    if(isset($_POST['like']))
    {
        $like = 1;
        $_SESSION['like'] = $like;
    }else{
        $like = 0;
        $_SESSION['like'] = $like;
    }
	$post_id = $_SESSION['login_user'];
	$image_id = $_POST['image_id'];
	$user_id = $_POST['image_user'];
	
	
    try {
		$stmt = $conn->prepare("INSERT INTO likes (likes, image_id, id_user, post_id) VALUES  (:likes, :image_id, :id_user, :post_id)");
        $stmt->bindparam(":likes", $like);
		$stmt->bindparam(":image_id", $image_id);
		$stmt->bindparam(":id_user", $user_id);
		$stmt->bindparam(":post_id", $post_id);
		$stmt->execute();

		$user_id = $_POST['image_user'];
		$tmp = $conn->prepare("SELECT email, Email_Notification FROM users WHERE username = :username");
		$tmp->bindParam(':username', $user_id);
        $tmp->execute();
        $result = $tmp->fetch();
		$user_id_email = $result[0];
		$Notification = $result[1];
		print_r($result[1]);
		
		if($Notification = 1){
			$to = $user_id_email;
			$subject = "New like";
			echo $message = "
			<html>
			<head>
			<title>NEW LIKE
			</title>
			</head>
			<body>
            <P>Someone just liked your image</P>
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
