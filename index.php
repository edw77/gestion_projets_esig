<?php
  session_start();
  $titre = "Accueil";
  include 'header.inc.php';
  $niveau = 0;
  include 'navbar.inc.php';
  include 'verification.inc.php';
  include 'message.inc.php';
  


?>
<div class="container">
    <h2>Bienvenue sur le site de gestion des projets !</h2>
    <p> Ce site a pour but de permettre aux élèves de sélectionner un sujet présent dans son departement afin de le réaliser au second semestre,
        mais également aux professeurs de créer et modifier leur sujet.</p> <br> <b>
    <?php if($_SESSION['statut'] == 0){ ?>
        <p>  Connectez-vous ou inscrivez-vous pour profiter des fonctionnalités du site. </p>
    <?php } if($_SESSION['statut'] == 1){ ?>
        <p>  Rendez vous sur la page "Liste des sujets" pour vous inscrire ou changer de projet.  </p>
    <?php } if($_SESSION['statut'] == 2){ ?>
        <p>  Vous pouvez créer ou modifier un sujet, et voir la liste des inscrits.  </p>
    <?php } if($_SESSION['statut'] == 1){ ?>
        <p>  En tant qu'administrateur, vous pouvez définir les professeurs à partir des inscrits et réinitialiser la base de données.  </p>
    <?php } ?> </b>

</div>
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="tic.jpg" class="d-block w-100" alt="Image représentant le département TIC">
        <div class="carousel-caption d-none d-md-block">
            <h5>Département Technologies de l'Information et de la Communication</h5>
        </div>
        </div>
        <div class="carousel-item">
        <img src="gee.jpg" class="d-block w-100" alt="Image représentant le département GEE">
        <div class="carousel-caption d-none d-md-block">
            <h5>Département Génie Électrique et Énergies</h5>
        </div>
        </div>
        <div class="carousel-item">
        <img src="sei.jpg" class="d-block w-100" alt="Image représentant le département SEI">
        <div class="carousel-caption d-none d-md-block">
            <h5>Département Systèmes Embarqués et Instrumentation</h5>
        </div>
        </div>
        <div class="carousel-item">
        <img src="et.jpg" class="d-block w-100" alt="Image représentant le département ET">
        <div class="carousel-caption d-none d-md-block">
            <h5>Département Électronique et Télécommunications</h5>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
<?php
  include 'footer.inc.php';
?>
</body>

</html>