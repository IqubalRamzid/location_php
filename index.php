<?php
session_start();
include "classes/voiture.php";
include "header.php";
if(!isset($_SESSION['user'])){
  header("Location: connexion.php");
}


$listeVoitures = Voiture::listeVoiture();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div id="main" class="container">
    <?php
      foreach($listeVoitures as $voiture){
        echo '<div class="card" style="width: 18rem;">
          <img src="images/'.$voiture['image'].'" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">'.$voiture['marque'].'</h5>
            <p class="card-text">disponible en '.$voiture['categorie'].'</p>
            <p class="card-text">'.$voiture['prix'].'</p>
            <a href="details.php?id='.$voiture['id_voiture'].'" class="btn btn-primary">details</a>
          </div>
        </div>';
      }
    ?>
  </div>
</body>
</html>
