<?php
  session_start();
  $titre = "Mon profil";
  
  $niveau = 1;
  include 'verification.inc.php';

  include 'header.inc.php';
  include 'navbar.inc.php';
  include 'message.inc.php';
  
    


?>
<body>
<div class="container">
    <div class="row justify-content-center">
        <h3>Votre profil</h3>
        <div class="col">
            <div class="card w-100 align-items-center">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $_SESSION['nom'];?></h5>
                </div>
                <ul class="list-group list-group-flush">
    <li class="list-group-item">#<?php echo $_SESSION['id'];?></li>

    <li class="list-group-item">Departement 
    <?php 
        switch ($_SESSION['dept']){
            case 1:
                echo "ET";
                break;
            case 2:
                echo "GEE";
                break;
            case 3:
                echo "SEI";
                break;
            case 4: 
                echo "TIC";
                break;
        }
    ?></li>
    <li class="list-group-item">
    <?php 
        switch ($_SESSION['statut']){
            case 1:
                echo '<i class="fas fa-user"></i> Etudiant';
                break;
            case 2:
                echo '<i class="fas fa-user-tie"></i> Professeur';
                break;
            case 3:
                echo '<i class="fas fa-user-cog"></i> Administrateur';
                break;
        }
    ?>
    </li>
  </ul>
</div>
        </div>
    </div>
</div>
<?php
    include 'footer.inc.php';
?>
</body>

</html>