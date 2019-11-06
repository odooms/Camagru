<?php 
//include('session.php');
?>
<html>
    <head>
        <meta charset= "utf-8">
        <link rel="stylesheet" type="text/css" href="user/style/style.css">
    </head>
        <body>
            <header>
                <h2>header</h2>
                <h1>Welcome <?php echo $login_session; ?></h1>
				<h2><a href="user/login.php">Login</a></h2>
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
