<?php
    session_start();

    $nom =  htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $email =  htmlentities($_POST['adresse_mail']);
    $passwd = htmlentities($_POST['mdp']);
    $dept = htmlentities($_POST['dept']);
    $options = [
        'cost' => 12,
    ]; 
    require_once("ConnexionBDD.inc.php");
    $mysqli = new mysqli($host, $login, $password, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
    if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom, prenom, adresse_mail, mdp, id_departement) VALUES (?, ?, ?, ?, ?)")) {
        $passwd = password_hash($passwd, PASSWORD_BCRYPT, $options);
        $stmt->bind_param("ssssi", $nom, $prenom, $email, $passwd, $dept);
        // Le message est mis dans la session, il est prÃ©fÃ©rable de sÃ©parer message normal et message d'erreur.
        if($stmt->execute()) {
            $_SESSION['state'] = "Success";
            $_SESSION['message'] = "Inscription rÃ©ussie ! Connectez-vous pour accÃ©der Ã  votre nouveau compte";
            header('Location: index.php');

        } else {
            $_SESSION['state'] = "Failure";
            $_SESSION['message'] =  "Erreur ! L'adresse email pourrait Ãªtre dÃ©jÃ  associÃ©e Ã  un compte ";
            header('Location: inscription.php');
        }
    }
    // Redirection vers la page d'accueil par exemple :
?>
