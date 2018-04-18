<?php
session_start();
include_once('../includes/connection.php');

if(isset($_SESSION['getUsername'])) {
    $username = $_SESSION['getUsername'];
    
    $query = $PDO->prepare("SELECT * FROM user WHERE username = ?");
    $query->bindValue(1, $username);
    $query->execute();
    $userinfo = $query->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['user_id'] = $userinfo['id'];
    $_SESSION['username'] = $userinfo['username'];
    $_SESSION['password_MD5'] = $userinfo['password'];
    $_SESSION['rank'] = $userinfo['rank'];
    
    $_SESSION['ingelogd'] = true;
    unset($_SESSION['getUsername']);
    
    header('Location: /Moedersmooiste/admin/');
    exit();
}
else {
    header('Location: /Moedersmooiste/');
    exit();
}
?>