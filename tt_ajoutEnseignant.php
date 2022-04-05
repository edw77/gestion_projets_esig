<?php
session_start();
if(isset($_POST['nom']) && isset($_POST['prenom']))
{
    // connexion Ã  la base de donnÃ©es
    $host="localhost";
    $login="root";
    $password="root";
    $dbname="bdd";
    $db = mysqli_connect($host, $login, $password, $dbname)
           or die('could not connect to database');
    $nomEnseignant =  htmlentities($_POST['nom']);
    $prenomEnseignant = htmlentities($_POST['prenom']);
    if($nomEnseignant !== "" && $prenomEnseignant !== "")
    {
        $sql = "SELECT * FROM utilisateur where nom = '$nomEnseignant' AND prenom ='$prenomEnseignant'";
        $resultat = mysqli_query($db, $sql) or die(mysql_error());
        $rows_number = mysqli_num_rows($resultat);
        $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
        //var_dump($row);
        if($rows_number == 1 && $row["id_role"] == 1){
            $sql2 = "UPDATE utilisateur SET id_role=2 where nom ='$nomEnseignant' AND prenom ='$prenomEnseignant'";
            $resultat2 = mysqli_query($db, $sql2) or die(mysql_error());
            $_SESSION['message'] = "L'Ã©lÃ¨ve $prenomEnseignant $nomEnseignant est maintenant enseignant.";
            header('Location: index.php');
          }
          else if($rows_number == 1 && $row["id_role"] == 2){
            $_SESSION['message'] = "$prenomEnseignant $nomEnseignant est dÃ©jÃ  enseignant.";
            header('Location: index.php'); 
          }
          else if($rows_number == 1 && $row["id_role"] == 3){
            $_SESSION['message'] = "$prenomEnseignant $nomEnseignant est administrateur. Il ne peut devenir enseignant.";
            header('Location: index.php'); 
          }
    }
    else
    {
       header('Location: pageAdmin.php'); // utilisateur ou mot de passe vide
       $_SESSION['message'] = "Veuillez remplir le formulaire";
    }
}
mysqli_close($db); // fermer la connexion
?>