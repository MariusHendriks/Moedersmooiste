<?php
    session_start();
    include_once('includes/connection.php');
    
    $query = $PDO->prepare("SELECT * FROM module ORDER BY 'order' ASC");
    $query->execute();
    $modules = $query->fetchAll();
?>
<html lang="nl">
    <head>
        <?php include_once('includes/header.php'); ?>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <div></div>
                    <div>
                        <li class="nav_link" id="nav_<?= $modules[1][1]; ?>"><?= $modules[1][1]; ?></li>
                        <li class="nav_link" id="nav_<?= $modules[2][1]; ?>"><?= $modules[2][1]; ?></li>
                        <li class="nav_link" id="nav_<?= $modules[3][1]; ?>"><?= $modules[3][1]; ?></li>
                    </div>
                    <div>
                        <?php include_once('resources/logo.svg'); ?>
                    </div>
                    <div>
                        <li class="nav_link" id="nav_<?= $modules[4][1]; ?>"><?= $modules[4][1]; ?></li>
                        <li class="nav_link" id="nav_<?= $modules[5][1]; ?>"><?= $modules[5][1]; ?></li>
                        <li class="nav_link" id="nav_<?= $modules[6][1]; ?>"><?= $modules[6][1]; ?></li>
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
            <div id="progressContainer">
                <div id="progressBar"></div>
            </div>
        </header>
        <main>
            <?php
                foreach ($modules as $module) {
                    include_once('modules/'.$module[1].'.php');
                }
            ?>
        </main>
        <script src="scripts/script.js"></script>
    </body>
</html>