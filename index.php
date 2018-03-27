<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Biografie</a></li>
                    <li><a href="">Shows</a></li>
                    <li><a href="">Videos</a></li>
                    <li><a href="">Muziek</a></li>
                    <li><a href="">Fotos</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="home"><?php include_once 'modules/home.php'?></section>
            <section class="biografie"><?php include_once 'modules/biografie.php'?></section>
            <section class="shows"><?php include_once 'modules/shows.php'?></section>
            <section class="videos"><?php include_once 'modules/videos.php'?></section>
            <section class="muziek"><?php include_once 'modules/muziek.php'?></section>
            <section class="fotos"><?php include_once 'modules/fotos.php'?></section>
            <section class="contact"><?php include_once 'modules/contact.php'?></section>
            <!-- javascript dingen -->
        </main>
    </body>
</html>