<?php
session_start();
include "classes/voiture.php";
include "header.php";
$details = Voiture::detailsVoiture($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>details vehicule</title>
</head>
<body>
<div id="detail" >
    <div>
      <img src="images/<?php echo $details['image'];  ?>" class="card">
      <span>Marque: <?php echo $details['marque']; ?></span>
      <br>
      <span>Modele:  <?php echo $details['modele']; ?></span>
      <span> Prix : <?php echo $details['prix']; ?> €/j</span>
      <br>
      <span>diponible en  <?php echo $details['categorie']; ?></span>
      <br>
      <span>Statut : <?php echo $details['statut'];?></span>
    </div>
    <div>
      <p id="desc"><?php echo $details['description'];?></p>

      <?php
        if($details['categorie']=="location"){
          echo '<form action="reserver.php" method="post">
          <input type="text" name="id_voiture" value="'.$details['id_voiture'].'" hidden>
          <input type="text" name="prix" value="'.$details['prix'].'" hidden>
          <button class="btn btn-primary" name="reserver">Reserver ce vehicule</button>
        </form>';
        }
      ?>
    </div>
  </div>
</body>
</html>