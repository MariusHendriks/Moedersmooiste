<?php
session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
?>
<html lang="nl">
    <head>
        <title>Admin panel | Moeders Mooiste</title>
        <?php include_once('../includes/header.php'); ?>
        <link rel="stylesheet" type="text/css" href="/Moedersmooiste/css/admin.css">
    </head>

    <body>
        <div id="all">
            <div id="menu">
                <div id="back">← terug naar website</div>
                <div id="menu_box_logo">
                    <div id="menu_logo_link">
                        <?php  include('../resources/logo.svg'); ?>
                    </div>
                </div>
                <div class="item active" id="dashboard">Dashboard</div>
                <div class="item" id="account">Mijn account</div>
                <div class="item" id="list">Lijst</div>
                
                <?php
                    if ($_SESSION['rank'] >= 1) {  
                ?>
                <div class="item" id="toevoegen">Toevoegen</div>
                <div class="item" id="wijzigen">Wijzigen</div>
                <div class="item" id="verwijderen">Verwijderen</div>
                <?php
                    }
                    
                    if ($_SESSION['rank'] == 2) {  
                ?>
                <div class="item" id="rank">Ranks aanpassen</div>
                <?php
                    }
                ?>
                <div id="logout">Uitloggen</div>
            </div>
            
            <div id="contentContainer">
                <div id="content"></div>
            </div>
        </div>
        <script src="/Moedersmooiste/scripts/admin.js"></script>
    </body>
</html>
<?php
}
else {
    header('Location: /Moedersmooiste/login');
    exit();
}
?>