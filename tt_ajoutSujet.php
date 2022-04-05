<?php
session_start();

if(isset($_POST['titre']) && isset($_POST['nombre_places']) && isset($_POST['description']))
{
   require_once("ConnexionBDD.inc.php");
   $db = new mysqli($host, $login, $password, $dbname);
   if ($db->connect_error) {
       die('Erreur de connexion (' . $db->connect_errno . ') '
               . $db->connect_error);
   }
    $title =  htmlentities($_POST['titre']);
    $placesTotales = htmlentities($_POST['nombre_places']);
    $resume = htmlentities($_POST['description']);
    $nombreInscription = 0;
    $auteur = $_SESSION['id'];
    $dept = $_SESSION['dept'];
    $nomFichier = basename($_FILES["uploadPdf"]["name"]);
    $target = 'pdf/' . $nomFichier;
    $uploadOk = 1;

    //$typeFichier1 = explode('.',$_FILES['uploadPdf']['name']);
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
            $_SESSION['message'] = $_SESSION['message'] . "Le fichier " . $nomFichier . " est enregistrÃ©.";
        } else {
            $_SESSION['message'] = $_SESSION['message'] . "Le fichier ". $nomFichier . " n'est pas enregistrÃ©.";
        }
    }

    $stmt = $db->prepare("INSERT INTO sujet(titre, nombre_places, id_departement, id_auteur, lien_pdf, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiss", $title, $placesTotales, $dept, $auteur, $nomFichier, $resume);
    if($stmt->execute()){
        $_SESSION['message'] = "Ajout de sujet rÃ©ussi.";

        $requete = "SELECT id_sujet FROM sujet WHERE id_auteur =" . $_SESSION['id'] ;
        $resultat = mysqli_query($db, $requete) or die(mysql_error());
        $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);

        $_SESSION['sujet'] = $row['id_sujet'];
        header('Location: descSujet.php?sujet=' . $_SESSION['sujet']);

    }
    else{
        $_SESSION['message'] = "Echec rencontrÃ© lors de l'ajout de sujet, veuillez rÃ©essayer. ";
        header('Location: creationDeSujet.php');
    }

    
}
mysqli_close($db); // fermer la connexion
?>