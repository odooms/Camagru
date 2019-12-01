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
                        <h2><a href="user/logout.php">Log out</a></h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h2><a href="user/modify_account.php">modify <br>account</a></h2>
                    </th>
                </tr>
                <tr>
                    <th>
                    <h2><a href="gallery.php">image<br>editor</a></h2>
                    </th>
                </tr>
            </table>
        </nav>
 <!-------Main-section---------->
    <article>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'config/setup.php';
    session_start();

    $user_id = `image_user`;
    $tmp = "SELECT * FROM comments WHERE user_id = $user_id";
    $com_data = $conn->prepare($tmp);
    $com_data->execute();
    $com_list = '<ul class = "images"';
    $row_data = $tmp->fetch();
    while($row_data = $tmp->fetch());
    echo $row_data;

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
		$list .= '<li class = "image-item">
						<div>
							<div>
								'.$row['image_user'].'
							</div>
							<img src = '.$row['image_source'].' width = "200px" height = "200px">
       						<form action="user/comment.php" method="post">
                                <div>
									 <textarea name="comments"  placeholder="add your comments "style="font-family" name="com" ></textarea>
								</div>
                                <button type="submit" name="submit">submit</button> 
                                <button type="submit" name="likes">likes</button>
                                <input type="hidden" name="image_user" value="'.$row['image_user'].'"/>
                                <input type="hidden" name="image_id" value='.$row['id'].'/>
                                <?php
                                $com_list = "<div>'
                                .$row_data['user_id'].'
                                </div>";
                                return ;
                                ?>
							</form>
						</div>
        			</li>';
    }
    echo $list;
    ?>
        <ul class ="pagination">
            <li>
                <a href="?pageno=1">First</a>
            </li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo 'home.php'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo 'home.php'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
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
    <script src="js/webcam.js"></script>
</html>
