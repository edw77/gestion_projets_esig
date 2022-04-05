<?php
    session_start();
    require_once("ConnexionBDD.inc.php");
    $mysqli = new mysqli($host, $login, $password, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
        $emptyBDD1 = "SET FOREIGN_KEY_CHECKS = 0;";
        $emptyBDD2 = "DELETE FROM utilisateur WHERE id_role = 1 OR id_role = 2;"; //Seuls les Ã©lÃ¨ves et les professeurs seront supprimÃ©s de la BDD
        $emptyBDD3 = "TRUNCATE table sujet;"; //vidage de la table des sujets
        $emptyBDD4 = "SET FOREIGN_KEY_CHECKS = 1;";
       
        $vidage = mysqli_query($mysqli, $emptyBDD1);
        $vidage = mysqli_query($mysqli, $emptyBDD2);
        $vidage = mysqli_query($mysqli, $emptyBDD3);
        $vidage = mysqli_query($mysqli, $emptyBDD4);

        $_SESSION['message'] =  "La rÃ©initialisation a Ã©tÃ© un succÃ¨s.";
        header("Location: pageAdmin.php");
        //echo "BDD Supp";
?>