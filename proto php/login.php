<?php

session_start();

 include 'data.php';

      $resultat = "";

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $nom= strtolower( trim($_POST['nom']));
    $password= trim($_POST['password']); 

    if(empty($nom) || empty($password)) {
        $resultat =" Veuillez remplir tous les champs";
    }
    else {
        $foundUser = null;

    foreach($users as $user){
        if(strtolower( $user["name"]) === $nom && ($user["password"]) === $password) 
        {
            $foundUser = $user;
            break;

            }
         }

       if($foundUser) {
        if($foundUser["active"]) {
            $_SESSION["user"] = $foundUser;
            header('Location: dashboard.php');
            exit;


        } else {
            $resultat ="⛔ Compte désactivé";
        }
    } else {
        $resultat =" Identifiants incorrects";
    }
}
       echo "<p>" . $resultat . "</p>";
    }





   ?>




<form action="" method="post">

<label >Name</label>
<input type="text" name="nom">
 
<label >Password</label>
<input type="password" name="password">

<button type="submit" name="submit">Se connecter</button>
</form>








