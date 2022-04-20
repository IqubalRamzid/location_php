<?php
session_start();
// inclusion du fichier user.php
include "classes/user.php";
// recuperer la saisie de 
if(isset($_POST['valider'])){
  $email = $_POST['email'];
  $password =$_POST['pwd'];

  // appel de methode connexion
  $user = User::connexion($email, $password);
  if(!empty($user)){
    if($user['type'] == "client"){
      $_SESSION['user'] = $user['id_user'];
      header("Location: index.php");
    }else{
      $_SESSION['user'] = $user['id_user'];
      header("Location: admin/accueil.php");
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
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div id="register-form" class="container">
    <form method="post">
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
          Se connecter
        </button>
      </div>
    </form>
    <a class="lien" href="inscription.php">Creer un compte</a>
  </div>
</body>
</html>