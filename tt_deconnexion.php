<?php
    session_start();
    
    $_SESSION['statut'] = 0;
    $_SESSION['message'] = "Vous vous Ãªtes dÃ©connectÃ© avec succÃ¨s !";
    $_SESSION['state'] = "Success";

    header('Location: index.php');


?>