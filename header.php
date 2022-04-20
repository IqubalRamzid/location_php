<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>La Boutique</title>
</head>
<body>
    <!-- As a link -->
  <nav class="navbar navbar-light bg-light">
    <div id="div-nav" class="container-fluid">
      <div>
        <a class="navbar-brand" href="http://exo.com/location/index.php">Accueil</a>
        <a class="navbar-brand" href="http://exo.com/location/vente.php">Vente</a>
        <a class="navbar-brand" href="http://exo.com/location/location.php">Location</a>
        <a class="navbar-brand" href="http://exo.com/location/mes_reservations.php">Mes reservations</a>
      </div>
      <div style="display: flex">
        <!-- partie affiche dynamiquement -->
        <?php
          if(isset($_SESSION['user'])){
            echo '
            <form method="post">
              <button name="logout" class="btn btn-danger">Deconnexion</button>
            </form>';
          }
        ?>
      </div>
    </div>
  </nav>

  <?php
    if(isset($_POST['logout'])){
      session_destroy();
      header("Location: http://exo.com/location/connexion.php");
    }
  ?>