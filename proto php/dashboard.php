<?php
session_start();

if(!isset($_SESSION["user"])) {
    header('Location: login.php');
    exit;
}else{
    $user = $_SESSION["user"];
}
 echo "<h1>Bienvenue " . $user['name'] . " ". $user['role'] . " !</h1>";
 echo "<a href='logout.php'>Se déconnecter</a>";
?>