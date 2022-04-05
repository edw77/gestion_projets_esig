<?php
     if(!isset($_SESSION['statut'])){
        $_SESSION['statut'] = 0;
      }

      if($_SESSION['statut'] < $niveau){ //Il ne doit pas pouvoir accÃ©der Ã  cette page
        $_SESSION['message'] = "Vous n'avez pas acces a cette page";
        $_SESSION['state'] = "Failure";
        $_SESSION['state2'] = 0;
        header('Location: index.php'); 
      }

      if( ($titre == "Connexion" || $titre == "Inscription") && $_SESSION['statut'] != 0 ){
        $_SESSION['message'] = "Vous êtes déjà connecté !";
        $_SESSION['state'] = "Failure";
        header('Location: index.php'); 
      }

?>