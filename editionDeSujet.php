<?php
  session_start();
  $titre = "Edition de sujet";

  $niveau = 2;
  include 'verification.inc.php';

  include 'header.inc.php';
  include 'navbar.inc.php';

  require_once("ConnexionBDD.inc.php");
  $mysqli = new mysqli($host, $login, $password, $dbname);
  $mysqli -> set_charset("utf8");

  $requete = "SELECT * FROM sujet where id_sujet =" . $_SESSION['sujet'] ;
  $resultat = mysqli_query($mysqli, $requete) or die(mysql_error());
  $rows_number = mysqli_num_rows($resultat);
  $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="fr">
<body>
    <header>
    </header>
    <h2> Edition de sujet </h2>

    <div class="container">
        <div class="row">
          <button type="button" data-toggle="modal" data-target="#titre" class="col-sm btn btn-outline-secondary btn-block">
                  <p><i class="fas fa-heading"></i>Titre/Description</p> 
                    </button>
         <button type="button" data-toggle="modal" data-target="#nb-places" class="col-sm btn btn-outline-secondary btn-block">
           <p><i class="fas fa-users"></i>Nombre de places</p> 
         </button>
          <button type="button" data-toggle="modal" data-target="#imp-pdf" class="col-sm btn btn-outline-secondary btn-block">
           <p><i class="far fa-file-pdf"></i>Importer un fichier PDF</p> 
           </button>
          <button type="button" data-toggle="modal" data-target="#ls-ins" class="col-sm btn btn-outline-secondary btn-block">
    <p><i class="fas fa-list-ul"></i>Liste des inscrits</p> 
    </button>
</div>
</div>

<div class="modal fade" id="titre" tabindex="-1" role="dialog" aria-labelledby="titre" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier le titre / la description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="tt_editionSujet.php" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
          <input type="text" class="form-control" placeholder="Titre" required name="titre">
        </div>
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
          <input type="text" class="form-control input-lg" placeholder="Entrer une description courte du sujet (moins de 255 caractÃ¨res)" required name="description">
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Valider</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="nb-places" tabindex="-1" role="dialog" aria-labelledby="nb-places" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier le nombre de places</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="tt_editionSujetNombreDePlaces.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
            <input type="number" class="form-control" min="2" placeholder="Nombre de places disponibles" required name="nombre_places">
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Valider</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="imp-pdf" tabindex="-1" role="dialog" aria-labelledby="imp-pdf" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Importer un pdf</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="tt_editionDeSujetFichierPDF.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group">
                          <label for="uploadPdf" class="col-form-label col-form-label-lg">Entrer le nouveau fichier PDF de description du sujet.</label>
                          <input type="file" class="form-control-file" id="uploadPdf" required name="uploadPdf" accept=".pdf,.docx">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Valider</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ls-ins" tabindex="-1" role="dialog" aria-labelledby="ls-ins" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Liste des incrits Ã  votre projet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Vous trouverez la liste des Ã©lÃ¨ves inscrits Ã  votre sujet ci-dessous: <p>
        <?php
        $nomInscrits = "SELECT  prenom, nom FROM utilisateur WHERE id_sujet =" . $_SESSION['sujet'] ;
        $rechercheSQL = mysqli_query($mysqli, $nomInscrits);
        $list = array();
        while($row = $rechercheSQL->fetch_assoc()){
          echo '<li> ' . $row['prenom'] . ' ' . $row['nom'] . '</li>';
        }
     
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


    <?php
  include 'footer.inc.php';
?>
</body>
</html>