<?php
session_start();
include_once('../includes/connection.php');

if (isset($_POST['newOrder'], $_POST['oldOrder'], $_POST['id'])){
    $queryOld = $PDO->prepare("UPDATE module SET orders = ? WHERE orders = ?");
    $queryOld->bindValue(1, $_POST['oldOrder']);
    $queryOld->bindValue(2, $_POST['newOrder']);
    $queryOld->execute();
    $result = $queryOld->rowCount() ? true : false;
    
    if ($result === true) {
        $queryNew = $PDO->prepare("UPDATE module SET orders = ? WHERE id = ?");
        $queryNew->bindValue(1, $_POST['newOrder']);
        $queryNew->bindValue(2, $_POST['id']);
        $queryNew->execute();
        echo($queryNew->rowCount() ? true : false);
    }
    else {
        echo false;
    }
}
else {
    header('Location: ../');
    exit();
}

?>