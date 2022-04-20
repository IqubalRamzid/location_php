<?php
session_start();
include "../classes/voiture.php";

if(isset($_POST['valider'])){
  // recuperation de la saisie de l'utilisateur
  $marque = $_POST['marque'];
  $model = $_POST['modele'];
  $categorie = $_POST['categorie'];
  $prix = $_POST['prix'];
  $statut = $_POST['statut'];
  $description = $_POST['description'];

  if(!empty($_FILES)){
    // nom de l'image
    $imageName = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $destination = $_SERVER["DOCUMENT_ROOT"].'/location/images/'.$imageName;
    if(move_uploaded_file($tmp, $destination)){
      $v = new Voiture($marque, $model, $categorie, $prix, $statut, $imageName, $description);
      $v->creerVoiture();
    }
  }

}
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
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="">Marque</label>
        <input class="form-control" type="text" name="marque" placeholder="marque">
      </div>

      <div class="mb-3">
        <label for="">Modele</label>
        <input class="form-control" type="text" name="modele" placeholder="model">
      </div>

      <div class="mb-3">
        <label for="">Categorie</label>
        <select name="categorie" class="form-control">
          <option value="vente">Vente</option>
          <option value="location">Location</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="">Prix</label>
        <input class="form-control" type="text" name="prix" placeholder="model">
      </div>

      <div class="mb-3">
        <label for="">Statut</label>
        <select name="statut" class="form-control">
          <option value="disponible">Disponible</option>
          <option value="indisponible">Indisponible</option>
          <option value="vendu">Vendu</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">
      </div>

      <div class="mb-3">
        <label for="">Description</label> <br>
        <textarea name="description" rows="3" placeholder="description"></textarea>
      </div>

      <div class="mb-3">
        <button class="btn btn-success" name="valider">
          s'incrire
        </button>
      </div>
    </form>
  </div>
</body>
</html>