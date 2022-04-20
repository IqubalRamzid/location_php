<?php
class Reservation{
  private $client;
  private $voiture;
  private $date_depart;
  private $date_arrivee;
  private $prix_total;

  public function __construct($c, $v, $date_dep, $date_arr, $prix_t){
    $this->client = $c;
    $this->voiture = $v;
    $this->date_depart = $date_dep;
    $this->date_arrivee = $date_arr;
    $this->prix_total = $prix_t;
  }

  // fonction pour valider une reservation
  public function reserverVehicule(){
    // etablir la connexion à la base de donnees
    include $_SERVER["DOCUMENT_ROOT"].'/location/classes/connexiondb.php';

    // preparation de la requette
    $req = $connexion->prepare("INSERT INTO reservations (client,voiture,date_depart, date_arrivee, prix_reservation) VALUES (?,?,?,?,?)");
    // executer la requette
    $req->execute(array($this->client, $this->voiture, $this->date_depart, $this->date_arrivee, $this->prix_total));

    $request = $connexion->prepare("UPDATE voitures SET statut = ? WHERE id_voiture = ?");
    $request->execute(array('indisponible', $this->voiture));
  }


  // methode permettant de verifier si une voitre est diponible
  public static function verifierStatut($id){
    // etablir la connexion à la base de donnees
    include $_SERVER["DOCUMENT_ROOT"].'/location/classes/connexiondb.php';
    // preparation de la requette
    $req = $connexion->prepare("SELECT * FROM voitures WHERE id_voiture = ? AND statut = ?");
    // execution de la requette
    $req->execute(array($id, 'disponible'));
    return $req->fetch();
  }


  // 
}