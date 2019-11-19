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
        <!-- <div class="row">
            <div class="column">
                <video id="vid-show" autoplay></video>
            </div>
            <div class="column">
                <div id="vid-canvas"></div>
            </div>
        </div> -->


        <ul class ="pagination">
            <li>
                <div class="column">
                    <video id="vid-show" autoplay></video>
                </div>
            </li>
            <li>
                <div class="column">
                    <div id="vid-canvas">
                    </div>
                </div>
            </li>
        </ul>
    </article>
</section>
<!-------footer---------->
<footer>
        <form action="home.php" method= "post" name = "form "enctype= "multipart/form-data">
    <input type= "file" name = "FileToUpload" id = "FileToUpload">
        <button type= "submit" value = "Upload Image" name = "UploadImage">UPLOAD</button>
        </form>
</footer>  
</body>
    <script src="js/webcam.js"></script>
</html>