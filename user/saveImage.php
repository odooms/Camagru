<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if(isset($_POST["save"])){
   $user = $_SESSION['login_user'];
   $date = time();
	//$random = rand();
    //$folder = "uploads/";
   // $image = $_FILES["FileToUpload"]["name"];
	//$path = $folder .$random. $image;
	//echo $path;
   // $target_file = $folder.basename($_FILES["FileToUpload"]["name"]);
    //$ImageType = pathinfo($target_file,PATHINFO_EXTENSION);

    $path = "NEED PATH";
    //if (move_uploaded_file($_FILES['FileToUpload']['tmp_name'], "../".$path)) {
    $stmt = $conn->prepare("INSERT INTO IMAGES (image_source, image_date, image_user) 
    VALUES ('$path', '$date', '$user')");
    $stmt->execute();
    //header("Location: ../gallery.php");
  // } else {
 //       echo "failed to upload";
 //   }
}
?>