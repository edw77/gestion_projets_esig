<?php
session_start();
    require_once("ConnexionBDD.inc.php");
    $db = new mysqli($host, $login, $password, $dbname);
    if ($db->connect_error) {
        die('Erreur de connexion (' . $db->connect_errno . ') '
                . $db->connect_error);
    }
    $nouveauFichier = basename($_FILES["uploadPdf"]["name"]);
    $target = 'pdf/' . $nouveauFichier;
    $uploadOk = 1;

    //$typeFichier1 = explode('.',$_FILES['editPdf']['name']);
    //$typeFichier = strtolower(end($typeFichier1));
    $_SESSION['message'] = " ";

    if (file_exists($target)) {
        $_SESSION['message'] = $_SESSION['message'] . "Le fichier existe dÃ©jÃ  dans la base de donnÃ©es.";
        $uploadOk = 0;  
    }

    // Allow certain file formats
    /*if(!strcmp($typeFichier, "pdf")) {
        $_SESSION['message'] = $_SESSION['message'] . "Seuls les PDF sont autorisÃ©s.";
        $uploadOk = 0;
    }*/

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['uploadPdf']['tmp_name'], $target)) {
            $_SESSION['message'] = $_SESSION['message'] . "Le fichier " . $nouveauFichier . " est enregistrÃ©.";
        } else {
            $_SESSION['message'] = $_SESSION['message'] . "Le fichier ". $nouveauFichier . " n'est pas enregistrÃ©.";
        }
    }
    $id_auteur = $_SESSION['id'];
    $sql = "SELECT * FROM sujet where id_auteur = '$id_auteur'";
    $resultat = mysqli_query($db, $sql) or die(mysql_error());
    $rows_number = mysqli_num_rows($resultat);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    $sql2 = "UPDATE sujet SET lien_pdf = '$nouveauFichier' where id_auteur = '$id_auteur'";
            $resultat2 = mysqli_query($db, $sql2) or die(mysql_error());
            header('Location: descSujet.php?sujet=' . $_SESSION['sujet']);
mysqli_close($db); // fermer la connexion
?>