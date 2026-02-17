<?php

session_start();

if(!isset($_session['user'])) {
    header('location: login.php');
    exit;

}
 echo "<h1>Bienvenue " . $_session['user'] . $_session['role'] . " !</h1>";


 echo "<a href='logout.php'>Se déconnecter</a>";

?>