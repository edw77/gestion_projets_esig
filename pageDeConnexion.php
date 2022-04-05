<?php
session_start();
  $titre = "Connexion";
  $niveau = 0;
  include 'verification.inc.php';

  include 'header.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';
?>
  
    <div class="container">
        <h3> Page de Connexion </h3>
        <p> Remplissez le formulaire de connexion ci-dessous: </p>
        <form action="tt_connexion.php" method="POST" id="form_login">
            <div class="form-row justify-content-center">
                <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">   
                    <input type="email" class="form-control" placeholder="adresse mail" required name="adresse_mail">
                </div>
                <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">  
                    <input type="password" class="form-control" placeholder="Mot de passe" required name="mdp">
                </div>
            </div>
            <div class="form-row justify-content-center">
                <button type="submit" class="btn btn-danger">Se Connecter</button>
            </div>  
        </form>
        <br>
        <br>

    </div>
    <?php
  include 'footer.inc.php';
?>
</body>
</html>