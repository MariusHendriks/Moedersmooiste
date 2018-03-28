<html lang="nl">
    <head>
        <?php include_once('includes/header.php'); ?>
    </head>
    <body>
        <?php include_once('includes/loader.php'); ?>
        <header>
            <nav>
                <ul>
                    <div></div>
                    <div>
                        <li id="nav_biografie">Biografie</li>
                        <li id="nav_shows">Shows</li>
                        <li id="nav_videos">Videos</li>
                    </div>
                    <div>
                        <?php include_once('resources/logo.svg'); ?>
                    </div>
                    <div>
                        <li id="nav_muziek">Muziek</li>
                        <li id="nav_fotos">Fotos</li>
                        <li id="nav_contact">Contact</li>
                    </div>
                    <div>
                        <span class="socialicons" id="spotify-FA"><i class="fab fa-spotify fa-lg" style="color: #353531;"></i></span>
                        <span class="socialicons" id="apple-FA"><i class="fab fa-apple fa-lg" style="color: #353531;"></i></span>
                        <span class="socialicons" id="facebook-FA"><i class="fab fa-facebook fa-lg" style="color: #353531;"></i></span>
                        <span class="socialicons" id="instagram-FA"><i class="fab fa-instagram fa-lg" style="color: #353531;"></i></span>
                        <span class="socialicons" id="youtube-FA"><i class="fab fa-youtube fa-lg" style="color: #353531;"></i></span>
                    </div>
                </ul>
            </nav>
            
        </header>
        <main>
            <section class="home">
                <?php include_once('modules/home.php'); ?>
            </section>
            <section class="biografie">
                <?php include_once('modules/biografie.php'); ?>
            </section>
            <section class="shows">
                <?php include_once('modules/shows.php'); ?>
            </section>
            <section class="videos">
                <?php include_once('modules/videos.php'); ?>
            </section>
            <section class="muziek">
                <?php include_once('modules/muziek.php'); ?>
            </section>
            <section class="fotos">
                <?php include_once('modules/fotos.php'); ?>
            </section>
            <section class="contact">
                <?php include_once('modules/contact.php'); ?>
            </section>
        </main>
        <script src="scripts/script.js"></script>
    </body>
</html>
