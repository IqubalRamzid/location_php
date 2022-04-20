<?php
session_start();
include "header.php";
include "classes/reservation.php";

if(isset($_POST['reserver'])){
  $_SESSION['voiture'] = $_POST['id_voiture'];
  $_SESSION['prix'] = $_POST['prix'];
}

if(isset($_POST['valider'])){
  $statut = Reservation::verifierStatut($_SESSION['voiture']);
  if(!empty($statut)){
    $date_dep = $_POST['date_dep'];
    $date_arr = $_POST['date_arr'];

    if($date_dep < $date_arr){
      $nbrjour = date_diff(date_create($date_dep), date_create($date_arr));
      $nj = $nbrjour->format('%R%a');
      $nj = explode('+',$nj);
      $nombreJour = $nj[1];

      
      $prix_total = $_SESSION['prix'] * $nombreJour;
      $r = new Reservation($_SESSION['user'],$_SESSION['voiture'],$date_dep,$date_arr,$prix_total);
      $r->reserverVehicule();
      // detruire les 
      unset($_SESSION['voiture']);
      unset($_SESSION['prix']);
    }
  }else{
    echo '<script> alert("vehicule pas disponible!")</script>';
  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <form method="post">
      <div class="mb-3">
        <label for="">Email</label>
        <input class="form-control" type="date" name="date_dep" >
      </div>

      <div class="mb-3">
        <label for="">password</label>
        <input class="form-control" type="date" name="date_arr" >
      </div>

      <div class="mb-3">
        <button class="btn btn-success" name="valider">
          Reserver
        </button>
      </div>
    </form>
  </div>
</body>
</html>