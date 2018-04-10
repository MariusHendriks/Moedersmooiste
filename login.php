<?php
    include_once("includes/connection.php");
    session_start();
    
    $query = $PDO->prepare("SELECT * FROM user");
    $query->execute();
    $result = $query->fetchAll();
?>
<html>
    <head>
    </head>
    <body>
        <h1>Hey!</h1>
        <?php
            foreach ($result as $array) {
        ?>
            <?= $array[0]; ?>
            <?= $array[1]; ?>
            <?= $array[2]; ?>
            <?= $array[3]; ?>
        <?php
            }
        ?>
    </body>
</html>