<?php
session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
?>
<html lang="nl">
    <head>
        <title>Admin panel | Moeders Mooiste</title>
    </head>

    <body>
        <div id="all">
            <div id="menu">
                <div id="back">← terug naar website</div>
                <div id="menu_box_logo">
                    <div id="menu_logo_link">
                        <?php  include('../resources/logo.svg'); ?>
                    </div>
                    <style>
                    #SVGLOGO {
    height: 6.5vh;
    padding: 0.5vh 1vw;
    cursor: pointer;
}

#SVGLOGO .stroke {
    fill: none;
    stroke: #353531;
    stroke-miterlimit: 10;
}

#SVGLOGO .stroke18 {
    stroke-width: 18;
}

#SVGLOGO .stroke17 {
    stroke-width: 17;
}

#SVGLOGO .fill {
    fill: #353531;
    stroke: #353531;
    stroke-miterlimit: 10;
}

#SVGLOGO .fill16 {
    stroke-width: 16.4339;
}

#SVGLOGO .fill11 {
    stroke-width: 11.7744;
}

#SVGLOGO .fill18 {
    stroke-width: 18;
}

#SVGLOGO .fullfill {
    fill: #353531;
}</style>
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
                <div class="item" id="media">Media</div>
                <?php
                    }
                    
                    if ($_SESSION['rank'] == 2) {  
                ?>
                <div class="item" id="rubrix">Rubrix' beheren</div>
                <div class="item" id="categorie">Categorieën beheren</div>
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
        <script src="../scripts/admin.js"></script>
    </body>
</html>
<?php
}
else {
    header('Location: /Moedersmooiste/login');
    exit();
}
?>