<?php
session_start();

if(isset($_POST['adresse_mail']) && isset($_POST['mdp']))
{
    require_once("ConnexionBDD.inc.php");
    $db = new mysqli($host, $login, $password, $dbname);
    if ($db->connect_error) {
        die('Erreur de connexion (' . $db->connect_errno . ') '
                . $db->connect_error);
    }
    $email =  htmlentities($_POST['adresse_mail']);
    $mdp = htmlentities($_POST['mdp']);
    $requete = "SELECT mdp,id_role
                FROM utilisateur 
                where adresse_mail ='$email'";
    $resultat = mysqli_query($db, $requete) or die(mysql_error());
    $rows_number = mysqli_num_rows($resultat);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    $test = password_verify($mdp, $row["mdp"]);
       //var_dump($row);
       //echo $row["mdp"];
    if($test == true){
        $_SESSION['state'] = "Success";
        $_SESSION['statut'] = $row["id_role"];
        $requete = "SELECT id_utilisateur,nom,prenom,id_departement,id_sujet
                    FROM utilisateur 
                    where adresse_mail ='$email'";
        $resultat = mysqli_query($db, $requete) or die(mysql_error());
        $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);

        $_SESSION['id'] = $row["id_utilisateur"];
        $_SESSION['nom'] = $row["nom"] . ' ' . $row["prenom"];
        $_SESSION['dept'] = $row['id_departement'];
        switch ($_SESSION['statut']) {
            case 1:
                if(isset($row['id_sujet'])){
                    $_SESSION['sujet'] = $row['id_sujet'];
                }
                else{
                    $_SESSION['sujet'] = 0;
                }
                $_SESSION['message'] = "Connexion rÃ©ussie. Bienvenue sur l'espace sur lequel vous pouvez dÃ©couvrir et sÃ©lectionner les sujets de projets de votre dÃ©partement.";
                header('Location: index.php');
                break;
            case 2:
                $requete = "SELECT sujet.id_sujet\n"
                            . " FROM utilisateur \n"
                            . " LEFT JOIN sujet ON utilisateur.id_utilisateur = sujet.id_auteur\n"
                            . " where adresse_mail ='" . $email . "'";
                $resultat2 = mysqli_query($db, $requete) or die(mysql_error());
                $row = mysqli_fetch_array($resultat2, MYSQLI_ASSOC);
                if(isset($row['id_sujet'])){
                    $_SESSION['sujet'] = $row['id_sujet'];
                    header('Location: editionDeSujet.php');
                }
                else{
                    $_SESSION['sujet'] = $row['id_sujet'];
                    $_SESSION['message'] = "Connexion rÃ©ussie. Bienvenue sur la page sur lequel vous pouvez modifier les sujets que vous avez crÃ©Ã©.";
                    header('Location: creationDeSujet.php');
                }
                break;
            case 3:
                $_SESSION['message'] = "Bienvenue sur la page Administrateur. Vous pouvez passer un Ã©lÃ¨ve en tant qu'enseignant ou vous pouvez rÃ©initialiser la base de donnÃ©es.";
                header('Location: pageAdmin.php');
                break;
            default:
                $_SESSION['state'] = "Failure";
                header('Location: pageDeConnexion.php'); // utilisateur sans rÃ´le
                $_SESSION['message'] = "Erreur dans la base de donnÃ©es.";
        }
    }
    else{
        $_SESSION['state'] = "Failure";
        header('Location: pageDeConnexion.php'); // utilisateur ou mot de passe incorrects
        $_SESSION['message'] = "Mot de passe et/ou adresse email incorrect(s)";
    }
}
mysqli_close($db); // fermer la connexion
?>