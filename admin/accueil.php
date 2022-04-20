<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>
<body>
  <?php
    include "header.php";
  ?>
  <div class="container">
  <button type="button" class="btn btn-secondary"><a class="boutton" href="ajout_voiture.php">Ajouter une voitre</a></button>
  <button type="button" class="btn btn-secondary"><a class="boutton" href="liste_reservation.php">Liste des reservations</a></button>
  <button type="button" class="btn btn-secondary"><a class="boutton" href="liste_voiture.php">Liste des voitures</a></button>
  </div>
</body>
</html>