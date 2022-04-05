<?php
session_start();
  $titre = "CrÃ©ation de Sujet";

  $niveau = 2;
  include 'verification.inc.php';


  include 'header.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="container">
    <h3> Page d'ajout de sujet </h3>
</div>
    <div class="container">
    <h5> Remplissez le formulaire d'inscription ci-dessous: </h5>
    <form action="tt_ajoutSujet.php" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
          <input type="text" class="form-control" placeholder="Titre" required name="titre">
        </div>
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
          <input type="number" class="form-control" min="2" placeholder="Nombre de places disponibles" required name="nombre_places">
        </div>
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
          <input type="text" class="form-control input-lg" placeholder="Entrer une description courte du sujet (moins de 255 caractÃ¨res)" required name="description">
        </div>
        <div class="form-group">
                        <label for="uploadPdf" class="col-form-label col-form-label-lg">Entrer une page de description sous forme de PDF si vous le souhaitez</label>
                        <input type="file" class="form-control-file" id="uploadPdf" name="uploadPdf" accept=".pdf,.docx">
        </div>
      </div>
<br>
<div class="form-row">
    <button type="submit" class="btn btn-danger"><h4>Valider</button>
</div>
<br>

</div>
</form>
</div>
<?php
  include 'footer.inc.php';
?>
