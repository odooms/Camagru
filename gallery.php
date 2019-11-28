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
                        <h2><a href="home.php">home page</a><h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h2><a href="index.php">Log out</a></h2>
                    </th>
                </tr>
                <tr>
                    <th>
                         <!----webcam------>
    <input id= "vid-take" type= "button" value= "Take Photo" name = "snap_shot">
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
       <table>
           <tr> 
               <td> 
                <div class="column">
                    <div id="vid-canvas">
                        <div class= "camera">
                            <video id="vid-show" autoplay></video>
                            <div id="camera"></div>
                            <canvas id="myCanvas" height= "250" width= "250"></canvas>
                        </div>
                        <div class="draw_container">
                            <table><tr><td>
                            <img src= "images/overlays/img.png" id= "pow" alt= "">
                            <button id="img" onclick= "img1();">draw image</button>
                        </td>
                        <td>
                            <img src= "images/overlays/omg.png" id= "omg" alt= "">
                            <button id="img" onclick= "img2();">draw image</button>
                        </td>
                        <td>
                            <img src= "images/overlays/nice.png" id= "nice" alt= "">
                            <button id="img" onclick= "img3();">draw image</button>
                        </td></tr></table>
                        <script src= "user/draw_to_image.js" type="text/javascript"></script>
                        </div>
                    </div>
                </div>
</td>
</tr>
  <tr>
    <td>
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
        $list .= '<li class = "image-item"> <img src = '.$row['image_source'].' width = "100px" height = "100px"></li>';
    }
    echo $list;
    ?>
    </td>
  </tr>
  
  <tr>
    <td><ul class ="pagination">
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
        </ul></td>
  </tr>
</table>
        
        
    </article>
</section>
<!-------footer---------->
<footer>
        <form action="user/upload.php" method= "post" name = "form "enctype= "multipart/form-data">
    <input type= "file" name = "FileToUpload" id = "FileToUpload">
        <button id = "Image"type= "submit" value = "Upload Image" name = "UploadImage">UPLOAD</button>
        </form>
        
</footer>
<script src="js/webcam.js"></script>  
</body>
</html>
