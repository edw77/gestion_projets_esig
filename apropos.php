<?php
  session_start();
  $titre = "A propos";
  
  $niveau = 0;
  include 'verification.inc.php';

  include 'header.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';
  


?>

<div class="container">
    <div class="row justify-content-center">
        <h3>Les auteurs du site</h3>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Edouard AJAVON</h5>
                    <p class="card-text">Parcours: SEI/TIC || Dominante: Cybersecurite</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Ilan MICHEAU-MAILLOU</h5>
                    <p class="card-text">Parcours: SEI/TIC || Dominante: Ingenierie des Services du Numeriques</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Victor BARBARAY</h5>
                    <p class="card-text">Parcours: SEI/TIC || Dominante: Mecatronique Genie Electrique</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
  include 'footer.inc.php';
?>
</body>

</html>