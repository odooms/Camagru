<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../config/setup.php");
session_start();
//echo "hello";
// $com_email = $_SESSION['email'];
 //echo $com_email;
if(isset($_POST['submit']))
{
	$post_id = $_SESSION['uname'];
	echo $post_id."post<br>";
	$image_id = $_POST['image_id'];
	echo $image_id."image_id<br>";
	$user_id = $_POST['image_user'];
	$comment = $_POST["comments"];
	echo $comment."comment<br>";
    try {
        $stmt = $conn->prepare("INSERT INTO comments (comment, image_id, user_id, post_id) VALUES  (:comment, :image_id, :user_id, :post_id)");// :image_id, user_id, :post_id)");
		
		$stmt->bindparam(":comment", $comment);
		$stmt->bindparam(":image_id", $image_id);
		$stmt->bindparam(":user_id", $user_id);
		$stmt->bindparam(":post_id", $post_id);
		$stmt->execute();
		header("Location: ../home.php");
   	}
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
   
    
}
?>
