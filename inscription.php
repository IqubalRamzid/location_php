<?php
// inclure le fichier user.php
include "classes/user.php";
// recuperation de la saisie de l'utilisateur
if(isset($_POST['valider'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];

  // instancier un objet user
  $u = new User($nom, $prenom, $email, $password);
  // appel de la methode inscription qui permet de creer l'utilisateur
  $u->inscription();
}

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
  <div id="register-form" class="container">
    <form method="post">
      <div class="mb-3">
        <label for="">Nom</label>
        <input class="form-control" type="text" name="nom" placeholder="Votre nom">
      </div>

      <div class="mb-3">
        <label for="">Prenom</label>
        <input class="form-control" type="text" name="prenom" placeholder="Votre prenom">
      </div>

      <div class="mb-3">
        <label for="">Email</label>
        <input class="form-control" type="email" name="email" placeholder="Votre email">
      </div>

      <div class="mb-3">
        <label for="">password</label>
        <input class="form-control" type="password" name="pwd" placeholder="Votre nom">
      </div>

      <div class="mb-3">
        <button class="btn btn-success" name="valider">
          s'incrire
        </button>
      </div>
    </form>
    <a class="lien" href="connexion.php">Se connecter</a>
  </div>
</body>
</html>