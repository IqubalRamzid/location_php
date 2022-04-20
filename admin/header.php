<nav id="head">
  <p>espace admin</p>
  <?php
  if(isset($_SESSION['user'])){
    echo '
      <form method="post">
        <button name="logout" class="btn btn-danger">Deconnexion</button>
      </form>';
  }

  if(isset($_POST['logout'])){
    session_destroy();
    header("Location: http://exo.com/location/connexion.php");
  }
  ?>
</nav>