<?php

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}else{
    $users = $_SESSION['user'];
}

echo "<h1>Bienvenue " . $users['name'] . "" . $users['role'] ." !</h1>";
echo "<a href='logout.php'>Se déconnecter</a>";
?>