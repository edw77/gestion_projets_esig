<nav class="navbar navbar-expand-lg navbar-light navbar-inverse" data-spy="affix" data-offset-top="197">
<div class="d-flex justify-content-center" >
  <a href="index.php"><img  src="banniereESIGELEC.png" alt="Banniere de l'ecole"></a>
</div>
<div class="col">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
        </li>
        <?php
            if ($_SESSION['statut'] != 0){
                echo ' <li class="nav-item">
                <a class="nav-link" href="monprofil.php">
                <i class="fa-regular fa-address-card"></i>
                Mon profil</a>
                </li>
                ';
            }
            if ($_SESSION['statut'] == 2){
                echo ' <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarSujet" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-project-diagram"></i>  
                Sujets
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarSujet">
                  <a class="dropdown-item" href="pageListeSujets.php">
                  <i class="fas fa-list"></i>
                  Liste</a>';
                  if($_SESSION['sujet'] != 0) {
                    echo '
                    <a class="dropdown-item" href="descSujet.php?sujet=' . $_SESSION['sujet'] . '">
                    <i class="fas fa-user"></i>
                    Votre sujet</a>
                    <a class="dropdown-item" href="editionDeSujet.php">
                    <i class="fas fa-edit"></i>
                    Editer</a>';
                }
                else{
                    echo '<a class="dropdown-item" href="creationDeSujet.php">
                    <i class="fas fa-plus"></i>
                    Creer</a>';
                }
            }
            else{
                echo '<li class="nav-item">
                <a class="nav-link" href="pageListeSujets.php">
                <i class="fas fa-project-diagram"></i>
                Liste des sujets</a>
                </li>';
            }
            if($_SESSION['statut'] == 3){
              echo ' <li class="nav-item">
              <a class="nav-link" href="pageAdmin.php">
              <i class="fas fa-tools"></i>
              Administration</a>
              </li>
              ';
            }
            ?>
            <li class="nav-item">
            <a class="nav-link" href="apropos.php">
            <i class="fas fa-question"></i>
                A propos</a>
          </li>
      </ul>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <?php
        if ($_SESSION['statut'] == 0){
            echo '
            <a href="https://moduleweb.esigelec.fr/grp_9_1/pageDeConnexion.php?" class="btn btn-outline-success m-2">
            <i class="fa-solid fa-right-to-bracket"></i>
            Connexion</a> 
            <a href="https://moduleweb.esigelec.fr/grp_9_1/inscription.php?" class="btn btn-outline-warning m-2">
            <i class="fa-solid fa-user-plus"></i>
            Inscription</a> 
	    ';
        }
        else{
            echo '
            <form action="tt_deconnexion.php" method="post">
            <button type="submit" name="deconnexion" class="btn btn-outline-danger"> <i class="fa fa-power-off"></i> Deconnexion</button>
            </form>
            ';
        }
        ?>
        </div> 
      </div>
</nav>

  