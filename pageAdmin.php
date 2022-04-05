<?php

  session_start();
  $titre = "Espace Administrateur";

  include 'header.inc.php';
  $niveau = 3;
  include 'verification.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';  

?>

<body>
<div class="container">
<h2> Page Administrateur </h2>
</div>
<div class="container2 col-sm-8">
    <div class="accordion" id="accordionSection">
        <div class="accordion-item mb-3">
            <h4 class="accordion-header">
                <button type="button" class="accordion-button collapsed"data-bs-toggle="collapse" data-bs-target="#collapseOne"><i class="fas fa-undo"></i>   RÃ©initialisation de la Base de DonnÃ©es</button></h4>
                <div class="accordion-collapse collapse" id="collapseOne" data-bs-parent="#accordionSection">
                    <div class="accordion-body">
                        <div class="containerBDD">
                            <div role="alert" class="alert alert-warning">
                                <h3><i class="fas fa-exclamation-triangle"></i></h3>Attention ! La rÃ©initialisation de la base de donnÃ©es est irrÃ©versible !
                            </div>
                            <form action="tt_reinitBDD.php" method="POST">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <div class="form-check">
                                    <br>
                                    <button type="submit" class="btn btn-danger">
                                    REINITIALISER</button>
                                </div>
                            </div>
                            </form>   
                        </div>
                    </div>
                </div>
        </div>
        <div class="accordion-item  mb-3">
        <h4 class="accordion-header">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo"><i class="fas fa-user-plus"></i>  Inscription d'un enseignant</button></h4>
            <div class="accordion-collapse collapse" id="collapseTwo" data-bs-parent="#accordionSection">
                <div class="accordion-body">
                    <p> Remplir le formulaire ci-dessous :</p>
                        <form method="post" action="tt_ajoutEnseignant.php">
                            <div class="form-row justify-content-center">
                                <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">   
                                    <input type="text" name="nom" id="nom" placeholder="Ex : Micheau" size="20" maxlength="10" />
                                </div>
                                <div class="col-10 offset-1 col-md-6 mb-3 mt-3 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center ">
                                    <input type="text" name="prenom" id="prenom" placeholder="Ex : Ilan" size="20" maxlength="10" />
                                </div>
                                <button type="submit" class="btn btn-danger"><h4>Changer l'eleve selectionne en enseignant</button>
                            </div> 
                        </form>                               
                </div>
            </div>
        </div>
    </div>
</div>
<?php
  include 'footer.inc.php';
?>

