<?php
    session_start();
    require_once("../ConnexionBDD.inc.php");
    $db = new mysqli($host, $login, $password, $dbname);
    if ($db->connect_error) {
        die('Erreur de connexion (' . $db->connect_errno . ') '
            . $db->connect_error);
    }

    $_SESSION['message'] = "Vous avez Ã©tÃ© inscrit avec succÃ¨s !";

    if ($_SESSION['sujet'] != 0){  //Il a deja un sujet
        $requete0 = "UPDATE `sujet` SET `nombre_inscrits` = `nombre_inscrits` - 1 WHERE `sujet`.`id_sujet` = " . $_SESSION['sujet'];
        $resultat0 = mysqli_query($db, $requete0) or die(mysql_error());
        $_SESSION['message'] = "Votre sujet a ete changÃ© avec succes";
    }

    $requete1 = "UPDATE `sujet` SET `nombre_inscrits` = `nombre_inscrits` + 1 WHERE `sujet`.`id_sujet` = " . $_POST['sujet'];
    $requete2 = "UPDATE `utilisateur` SET `id_sujet` = '" . $_POST['sujet'] . "' WHERE `utilisateur`.`id_utilisateur` = " . $_SESSION['id'];
    
    $resultat1 = mysqli_query($db, $requete1) or die(mysql_error());
    $resultat2 = mysqli_query($db, $requete2) or die(mysql_error());
    $_SESSION['sujet'] = $_POST['sujet'];

    $_SESSION['state'] = "Success";
    
    header('Location: ../pageListeSujets.php');
    

?>

