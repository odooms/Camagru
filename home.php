<?php 
//include('session.php');
session_start();
?>
<html>
    <head>
        <meta charset= "utf-8">
        <link rel="stylesheet" type="text/css" href="user/style/style.css">
    </head>
        <body>
            <header>
                <h2>header</h2>
                <h1>Welcome <?php echo $_SESSION['id']; ?></h1>
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
