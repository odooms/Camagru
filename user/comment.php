<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../config/setup.php");
session_start();
echo "hello";
// $com_email = $_SESSION['email'];
 //echo $com_email;
if(isset($_POST['submit']))
{
    //$uname = $_SESSION['uname'];
    $comments = $_POST["comments"];
    echo $comments;
    try{
        $stmt = $conn->prepare("INSERT INTO comments (comments) VALUES 
        (:comments)");
        $stmt->bindParam(':comments', $comments);
        $stmt->execute();

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
   
    
}
?>