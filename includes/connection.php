<?php

$servername = "";
$whitelist = array("127.0.0.1", "::1");

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // Server so use internal servername
    $servername = "mysql1324int.cp.hostnet.nl";
}
else {
    // Localhost so use external servername
    $servername = "mysql1324.cp.hostnet.nl";
}

$dbname = "db280763_MoedersMooiste";
$username = "u280763_admin";
$password = "Lp8dWN2g6";

try {
	$PDO = new PDO("mysql:host=".$servername."; dbname=".$dbname, $username, $password);
}
catch (PDOException $e) {
    exit("Unable to create connection to DataBase ".$dbname);
}

?>
