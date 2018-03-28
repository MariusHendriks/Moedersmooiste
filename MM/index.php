<html>
    <head>
        <title>Moeders Mooiste</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <div>
                        <li id="nav_biografie">Biografie</li>
                        <li id="nav_shows">Shows</li>
                        <li id="nav_videos">Videos</li>
                    </div>
                    <div id="header_logo">
                        <?php include_once('resources/logo.svg'); ?>
                    </div>
                    <div>
                        <li id="nav_muziek">Muziek</li>
                        <li id="nav_fotos">Fotos</li>
                        <li id="nav_contact">Contact</li>
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
            <script>
                $(document).ready(function() {
                    $("#SVGLOGO").on({
                        mouseenter: function(){
                            $(this).css({height: "7vh", padding: "0.25vh 1vw", transition: "0.5s"});
                        },
                        mouseleave: function(){
                            $(this).css({height: "5.5vh", padding: "1vh 1vw",transition: "0.5s"});
                        },
                        click: function(){
                            $("html, body").animate({scrollTop: 0}, 750);
                        }
                    });
                    
                    $("header nav ul div li").on("click", function() {
                        var navID = this.id;
                        var navArray = navID.split('_');
                        var offset = $("nav").height();
                        $("html, body").animate({scrollTop: $("."+navArray[1]).offset().top - offset}, 750);
                    });
                });
            </script>
        </main>
    </body>
</html>