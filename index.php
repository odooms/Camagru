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
        $list .= '<li class = "image-item"> <img src = '.$row['image_source'].' width = "200px" height = "200px"></li>';
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
