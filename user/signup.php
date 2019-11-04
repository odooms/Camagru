<?php
include_once("../configuration/setup.php");
error_reporting(0);
echo("ok");
if(isset($_POST['signup']))
{
    $username = $_POST['uname'];
    $userEmail = $_POST['email'];
    $password = $_POST['pword'];
//	echo $username;
	
    // validation of username and email-id
/*    $ret = "SELECT * FROM User WHERE username = :username || email = :userEmail";
    $queryt = $conn->prepare($ret);
    $queryt->bindParam(':username', $username,PDO::PARAM_STR);
    $queryt->bindParam(':userEmail', $userEmail,PDO::PARAM_STR);
    $queryt->execute();
    $results = $queryt->fetchAll(PDO::FETCH_OBJ);
    echo "kkk";
    if($queryt->rowCount() == 0)
    {
        //insertion
        $sql = "INSERT INTO User (username, email, 'password') VALUES (:uname, :email, :pword)";
        $query = $conn->prepare($sql);
        //binding post values
        $query->bindParam(':uname', $username, PDO::PARAM_STR);
        $query->bindParam(':email', $userEmail, PDO::PARAM_STR);
        $query->bindParam(':pword', $password);
        $query->exececute();
        echo "alal";
        $lastInsertId = $conn->$lastInsertId();
        if($lastInsertId){
            $msg = "You have Signup Successfully";
        }else{
            $error = "Username or Email-id already exist. please try again";
		}
	}*/
	echo("hello");
}
echo("ssss");
	//change to login .php
	 header("Location: ../index.php")
?>
