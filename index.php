<?php 
//include('session.php');
include_once('configuration/setup.php');
?>
<html>
    <head>
            <meta charset= "utf-8">
            <!--<link rel="stylesheet" type="text/css" href="Camagru.css">-->
            <style>
            /* main_page*/

header{
    background-color: #666;
    padding: 30px;
    text-align: center;
    font-size: 350x;
    color: water;
}
nav{
    float: left;
    padding: 20px;
    height: 300px;
    background: #ccc;
    padding: 20px;
}
article{
    float:left;
    padding: 20px;
    width: 70%;
    background-color: #f1f1f1;
    height: 300px;

}
section:after{
    content: " ";
    display: table;
    clear: both;
}
footer{
    background-color: #777;
    padding: 10px;
    text-align: center;
    clear: both;
}
nav article{
    width: 100%;
    height:auto ;
}
            </style>
        <body>
            <header>
                <h2>header</h2>
                <h1>Welcome <?php echo $login_session; ?></h1>
				<h2><a href="login.php">Login</a></h2>
				<h2><a href="user/registration.php">Register</a></h2>

            </header>
            <section>
                <nav>


                    <p>side section</p>
                </nav>
                <article>


                    <p>main section</p>
                </article>
            </section>
            <footer>


                <p>footer</p>
                </footer>
        </body>
    </head>
</html>
