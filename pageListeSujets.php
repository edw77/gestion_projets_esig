<?php
  session_start();
  
  $titre = "Liste des sujets";

  $niveau = 0;
  include 'verification.inc.php';

  include 'header.inc.php';
  include 'navbar.inc.php';
  include './pageSujet/tt_liste_sujets.php';

  include 'message.inc.php';

  require_once("ConnexionBDD.inc.php");
  $mysqli = new mysqli($host, $login, $password, $dbname);
  $mysqli -> set_charset("utf8");
?>

    <div class="container">
        <h1>Selectionnez un departement</h1>
    </div> 
    <form name="choixSujet" action="descSujet.php" method="GET">
    <div id="accordion">
 	<div class="card">
  	  <div class="card-header">
  	    <a class="card-danger" data-toggle="collapse" href="#ET">
 	       ET
	      </a>
	    </div>
	    <div id="ET" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	      <?php
	        getListProjects(1,$mysqli);
			?>
	      </div>
	    </div>
	  </div>
	  <div class="card">
	    <div class="card-header">
	      <a class="card-danger" data-toggle="collapse" href="#GEE">
	        GEE
	      </a>
	    </div>
	    <div id="GEE" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	      <?php
	        getListProjects(2,$mysqli);
			?>
	      </div>
	    </div>
	  </div>
	  <div class="card">
	    <div class="card-header">
	      <a class="card-danger" data-toggle="collapse" href="#SEI">
	        SEI
	      </a>
	    </div>
	    <div id="SEI" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	      <?php
	        getListProjects(3,$mysqli);
			?>
	      </div>
	    </div>
	  </div>
	  <div class="card">
	    <div class="card-header">
	      <a class="card-danger" data-toggle="collapse" href="#TIC">
	        TIC
	      </a>
	    </div>
	    <div id="TIC" class="collapse" data-parent="#accordion">
	      <div class="card-body">
	      <?php
	        getListProjects(4,$mysqli);
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
