<?php
session_start();
if(isset($_POST['nombre_places'])){
    require_once("ConnexionBDD.inc.php");
    $db = new mysqli($host, $login, $password, $dbname);
    if ($db->connect_error) {
        die('Erreur de connexion (' . $db->connect_errno . ') '
                . $db->connect_error);
    }
    $nouveauNombreDePlaces =  htmlentities($_POST['nombre_places']);
    $nouveauNombreDePlaces = real_string_escape($db, $nouveauNombreDePlaces );

    $id_auteur = $_SESSION['id'];
    $sql = "SELECT * FROM sujet where id_auteur = '$id_auteur'";
    $resultat = mysqli_query($db, $sql) or die(mysql_error());
    $rows_number = mysqli_num_rows($resultat);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    if($nouveauNombreDePlaces < $row['nombre_places']){
        $_SESSION['message'] = "Erreur: Le nouveau nombre de places disponible est infÃ©rieur au nombre d'inscrits.";
        header('Location: descSujet.php?sujet=' . $_SESSION['sujet']);
    }
    else{
    $sql2 = "UPDATE sujet SET nombre_places = '$nouveauNombreDePlaces' where id_auteur = '$id_auteur'";
            $resultat2 = mysqli_query($db, $sql2) or die(mysql_error());
            header('Location: descSujet.php?sujet=' . $_SESSION['sujet']);
    }
}
mysqli_close($db); // fermer la connexion
?>