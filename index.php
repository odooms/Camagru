<?php 
//include('session.php');
include_once('config/setup.php');
?>
<html>
<head>
<meta charset= "utf-8">
<meta name = "viewport" content = "width=device-width, intial-scale=1">
<link rel="stylesheet" type="text/css" href="user/style/home.css">
</head>
<body>
<!-------Header---------->
<header>
<table style="width:100%">
<tr>
<th><h1>Camagru</h1></th>
</table>
<?php if ($_SESSION["error"]) {echo $_SESSION["error"];}$_SESSION["error"] = null;?>
</header>
<!-------Side-section---------->
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
<!-------Main-section---------->  
<article>
<?php 
    include 'config/setup.php';
    session_start();

    function fetch_comments($image_id, $connection)
{
	$tmp = "SELECT * FROM comments WHERE `image_id` = $image_id";
	$com_data = $connection->prepare($tmp);
	$com_data->execute();
	$com_list = '<div class = "comment_text">';
	while($row_data = $com_data->fetch())
	{
		$com_list .= '<div>'.$row_data['post_id'].'</div><div>'.$row_data['comment'].'</div>';
	}
	return($com_list. '</div>');

}

function fetch_likes($image_id, $connection)
{
	$tmp = "SELECT likes FROM likes WHERE `image_id` = $image_id";
	$like_data = $connection->prepare($tmp);
	$like_data->execute();
	$like_list = '<div>';
	while($col_data = $like_data->fetch())
	{
		$like_list .= '<div>'.$col_data['likes'].'</div>';
	}
	return($like_list. '</div>');
}

    $pageno  = 1;
    if (isset($_GET['pageno'])){
        $pageno = $_GET['pageno'];
    }else{
        $pageno = 1;
    }
    $no_of_images_per_page = 5;
    $offset = ($pageno-1) * $no_of_images_per_page;

    $total_images_sql = "SELECT * FROM images";
    $result = $conn->prepare($total_images_sql);
    $result->execute();
    $total_rows = $result->rowCount();
    $total_pages = ceil($total_rows / $no_of_images_per_page);

    $sql = "SELECT * FROM images LIMIT $offset, $no_of_images_per_page";
    $res_data = $conn->prepare($sql);
    $res_data->execute();
    $list = '<ul class = "images">';
    while($row = $res_data->fetch())
    {
        $list .= '<li class = "image-item"> <div><p>likes</p>'.fetch_likes($row['id'], $conn).'</div><img src = '.$row['image_source'].' width = "200px" height = "200px">'.fetch_comments($row['id'], $conn).'</li>';
        
    }
    echo $list;
?>
<ul class ="pagination">
            <li>
                <a href="?pageno=1">First</a>
            </li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo 'index.php'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo 'index.php'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li>
                <a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
</article>
</section>
<!-------footer---------->
<footer>
</footer>
</body>
</head>
</html>
