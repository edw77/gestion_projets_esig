<?php
  session_start();
  $titre = "Description du sujet";
  $niveau = 1;
  include 'verification.inc.php';
  include 'header.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';
  include './pageSujet/tt_liste_sujets.php';

  require_once("ConnexionBDD.inc.php");
  $mysqli = new mysqli($host, $login, $password, $dbname);
  $mysqli -> set_charset("utf8");

?>

<html>
  <head>
  <link rel="stylesheet" href="./css/descSujet.css">
</head>
<form action="./pageSujet/tt_inscription_sujet.php" method="POST">
<?php
    getInfoProjects($_GET['sujet'],$mysqli);
	?>
<div class="modal fade" id="chsujet" tabindex="-1" role="dialog" aria-labelledby="chsujet" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Changer de sujet ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous Ãªtes dÃ©jÃ  inscrit sur un projet <br> Voulez-vous changer de sujet ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <?php
        echo '
        <button class="btn btn-danger" type="submit" name="sujet" value=' . $_GET['sujet'] . '> S\'inscrire</button>';
        ?>
      </div>
    </div>
  </div>
</div>
</form>
<?php
  include 'footer.inc.php';
?>
</html>