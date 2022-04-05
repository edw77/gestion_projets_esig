<?php

  function getInfoProjects($id,$mysqli) {

    $requete = "SELECT * FROM `sujet` 
                INNER JOIN departement 
                ON sujet.id_departement = departement.id_departement 
                INNER JOIN utilisateur
                ON sujet.id_auteur = utilisateur.id_utilisateur
                WHERE sujet.id_sujet=$id";
    $resultat = $mysqli -> query($requete);
		while ($ligne = $resultat -> fetch_assoc()) {

      $_SESSION['sujet_nbp'] = $ligne['nombre_places'];
      $_SESSION['sujet_nbi'] = $ligne['nombre_inscrits'];

      echo 
      '<div class="container">
        <h1>' . $ligne['titre'] . '</h1>        
    </div>
    <div class="container">
    <div class="row">
    <div class="col">
    <div class="row">
        <h3>Description</h3>';

      if($ligne['description'] != null){
        echo '<p class="text-center">' . $ligne['description'];
      }
      else{
        echo '<p class="text-center"> Aucune description.';
      }
      echo '
</p>  
<div class="col">
<p> <b>Departement : </b>' . $ligne['nom_departement'] . ' 
</p>
</div>
<div class="col">
<b>Auteur :</b> ' . $ligne['prenom'] . ' ' . $ligne['nom'] . '
</div>
</div>
<div class="row">
<a ';
      if($ligne['lien_pdf'] != null){
        echo 'href="./pdf/' . $ligne['lien_pdf'];
      } 
      echo '"><button type="button" class="btn btn-danger"';
      if($ligne['lien_pdf'] == null){
        echo ' disabled';
      } 
      echo '>Telecharger le PDF</button></a>
</div>
<div class="row">
<h3 class="desc"> Nombre de places restantes</h3>  
    <div class="percent1">
      <svg>
        <circle cx="70" cy="70" r="70"></circle>
        <circle cx="70" cy="70" r="70"></circle>
      </svg>
      <div class="number">
        <h2>' . ( $ligne['nombre_places'] - $ligne['nombre_inscrits'] ) . '<span>/' . $ligne['nombre_places'] . '</span></h2>
      </div>
  </div>
  </div>
  <div class="row">';
  
      if($ligne['nombre_places'] - $ligne['nombre_inscrits'] != 0){
      if($_SESSION['statut'] == 1 && $_SESSION['dept'] == $ligne['id_departement']){ //L'utilisateur est un eleve de ce departement
        echo '
        <button';
        if($_SESSION['sujet'] != 0 && $_SESSION['sujet'] != $id){  //L'utilisateur a deja un sujet different
          echo ' type="button" data-toggle="modal" data-target="#chsujet" ';
        } 
        else if($_SESSION['sujet'] != $id){
          echo ' type="submit" ';
        } 
        echo '
      class="btn btn-danger"';
        if($_SESSION['sujet'] == $id){ // L'utilisateur est deja  inscrit dans ce sujet
        echo '  type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Vous Ãªtes dÃ©jÃ  inscrit sur ce projet !';
      } 
        echo '"  value=' . $id . ' name="sujet"><h4>S\'inscrire</h4></button>';
    }
      }
      
    echo '
  </div>
  </div>';
  if($ligne['lien_pdf'] != null){
    echo '<div class="col d-none d-md-block">
            <object type="application/pdf"
              data="./pdf/' . $ligne['lien_pdf'] . '"
              width="100%"
              height="100%">
            </object>
          </div>
    ';
  } 
  echo '
  </div>
  </div>
  </div>
<style>
  .percent1 circle:nth-child(2) {
    stroke-dashoffset: ' . (440-(440*($ligne['nombre_places']-$ligne['nombre_inscrits']))/$ligne['nombre_places']) . ';
    stroke: rgb(196, 14, 60);
    animation: percent 1.5s linear;
    animation-delay: 1s;
  }
</style>';

  }
}

  function getListProjects($id,$mysqli){
    $requete = "SELECT * FROM `sujet` WHERE id_departement=$id";
      $resultat = $mysqli -> query($requete);
		while ($ligne = $resultat -> fetch_assoc()) {
      echo 
      '<div class="card bg-light">
        <div class="card-body text-center">
          <p class="card-text">Projet ' . $ligne['id_sujet'] . '</p>
          <p>' . $ligne['titre'] . '</p>
            <button type="submit" class="btn btn-danger" name="sujet" value="' 
            . $ligne['id_sujet'] . '"> En savoir plus </button>
        </div>
      </div>';

		}
  }
?>

