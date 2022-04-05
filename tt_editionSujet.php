<?php
session_start();
if(isset($_POST['titre']) && isset($_POST['description'])){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
    require_once("ConnexionBDD.inc.php");
    $db = new mysqli($host, $login, $password, $dbname);
    if ($db->connect_error) {
        die('Erreur de connexion (' . $db->connect_errno . ') '
                . $db->connect_error);
    }
    $nouveauTitre =  htmlentities($_POST['titre']);
    $nouvelleDescription = htmlentities($_POST['description']);
    $id_auteur = $_SESSION['id'];
    //echo $_SESSION['id'];
    //echo $id_auteur;

   /* $id_auteur= preg_replace_callback(
        '!s:(\d+):"(.*?)";!', 
        function($m) { 
            return 's:'.strlen($m[2]).':"'.$m[2].'";'; 
        }, 
        $_SESSION['id']);
    
    var_dump(unserialize($id_auteur));*/

    $sql = "SELECT * FROM sujet where id_auteur = '$id_auteur'";
    $resultat = mysqli_query($db, $sql) or die(mysql_error());
    $rows_number = mysqli_num_rows($resultat);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    //var_dump($row);
    $sql2 = "UPDATE sujet SET titre = '$nouveauTitre' , description = '$nouvelleDescription' where id_auteur = '$id_auteur'";
            $resultat2 = mysqli_query($db, $sql2) or die(mysql_error());
            header('Location: descSujet.php?sujet=' . $_SESSION['sujet']);
}
mysqli_close($db); // fermer la connexion
?>