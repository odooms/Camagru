<?php 
session_start();
if (isset($_GET['pageno'])){
    $pageno = $_GET['pageno'];
}else{
    $pageno = 1;
}
$no_of_images_per_page = 5;
$offset = ($pageno-1) * $no_of_images_per_page;

$total_images_sql = "SELECT COUNT(*) FROM table";
//$result = mysqli_query($conn,$total_images_sql);
$result = $conn->prepare($total_images_sql);
$total_rows = execute($result)[0];
$total_pages = ceil($total_rows / $no_of_images_per_page);

$sql = "SELECT * FROM table LIMIT $offset, $no_of_images_per_page";
//$res_data = $conn->prepare($sql);
$res_data = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res_data)){

}
mysqli_close($conn);
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
            </tr>
        </table>
    </header>
<!-------Side-section---------->
    <section>
        <nav>
            <table>
                <tr>
                    <th>
                        <h2><h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h2><a href="index.php">Log out</a></h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h2><a>account</a></h2>
                    </th>
                </tr>
                <tr>
                    <th>
                    </th>
                </tr>
            </table>
        </nav>
 <!-------Main-section---------->       
    <article>
    <!-- <div id="vid-canvas"></div> -->
        <ul class ="pagination">
            <li>
                <a href="?pageno=1">First</a>
            </li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo 'gallery.php'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo 'gallery.php'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li>
                <a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </article>
</section>
<!-------footer---------->
<footer>
    <input id= "vid-take" type= "button" value= "Take Photo">
        <form name = "form "method= "post" action="upload.php"  enctype= "multipart/form-data">
    <input type= "file" name = "file"/><br/><br/>
        <button type= "submit" name = "submit_login">UPLOAD</button>
        </form>
</footer>
    <video id="vid-show" autoplay></video>
</body>
    <script src="js/webcam.js"></script>
</html>