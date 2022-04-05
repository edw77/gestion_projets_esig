<?php
  session_start();
  $titre = "Inscription";
  $niveau = 0;
  include 'verification.inc.php';

  include 'header.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';
?>

    <h3> Page d'inscription </h3>
    <div class="container">
    <h5> Remplissez le formulaire d'inscription ci-dessous: </h5>
    <form action="tt_inscription.php" method="POST">
      <div class="form-row">
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
          <input type="text" class="form-control " placeholder="nom" required name="nom">
        </div>
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
          <input type="text" class="form-control" placeholder="prenom" required name="prenom">
        </div>
      </div>
      <div class="form-row">
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
          <input type="email" class="form-control" placeholder="Adresse email" required name="adresse_mail">
        </div>
        <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
          <input type="password" class="form-control" placeholder="Mot de passe" required name="mdp">
        </div>
      </div>
      <div class="form-row">
        <p>Renseignez votre dÃ©partement</p>
            <select name="dept">
            <option value="2">GEE</option>
            <option value="4">TIC</option>
            <option value="3">SEI</option>
            <option value="1">ET</option>
            </select>
      </div>
      <br>
      <div class="form-row">
          <button type="submit" class="btn btn-danger">Valider</button>
      </div>
    </form>
    </div>
<?php
  include 'footer.inc.php';
?>
