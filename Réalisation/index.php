<?php
$jsonFile = file_get_contents('data.json');
$taches = json_decode($jsonFile, true);
$afficher = "
<table border='1'>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>État</th>
            <th>Actions</th>
        </tr>";

foreach($taches as $tache) {
    $afficher.= "
    <tr>
    <form method='POST'>
        <td><input type='hidden' name='idtache' value='" . $tache['id']."'>". $tache['id'] . "</td>
        <td>" . $tache['titre'] . "</td>
        <td>" . $tache['etat'] . "</td>
        <td> <button type='submit' name='changer'>changer etat</button><button type='submit' name='supprimer'>supprimer</button></td>
    </form>
    </tr>";
}
$afficher.= "</table>";
echo $afficher;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $tacheid=$_POST['idtache'];

    if(isset($_POST['changer'])){

        foreach($taches as &$tache) {
            if($tache['id'] == $tacheid) {
            if($tache['etat'] == "fait") {
                $tache['etat'] = "à faire";
            } else{
                $tache['etat'] = "fait";
                
            }
        }
    }

   file_put_contents('data.json', json_encode($taches, JSON_PRETTY_PRINT));
   header("Location: ". $_SERVER['PHP_SELF']);
   exit;
}
}



if(isset($_POST['supprimer'])){
    foreach($taches as $key => $tache){
        if($tache['id'] == $tacheid){
            unset($taches[$key]);
        }
    }

    $taches = array_values($taches);

    foreach($taches as $key => $tache){
        $taches[$key]['id'] = $key + 1;
    }

    file_put_contents('data.json', json_encode($taches, JSON_PRETTY_PRINT));

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
