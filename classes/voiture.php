<?php
class Voiture{
  private $marque;
  private $modele;
  private $categorie;
  private $prix;
  private $statut;
  private $image;
  private $description;


  // constucteur de la classe 
  public function __construct($ma, $mo, $ca, $pr, $st, $im, $des){
    $this->marque = $ma;
    $this->modele = $mo;
    $this->categorie = $ca;
    $this->prix = $pr;
    $this->statut = $st;
    $this->image = $im;
    $this->description = $des;
  }

  // methode qui permet d'enregistre les info d'une voiture dans la base de donnees
  public function creerVoiture(){
    // etablir la connexion à la base de donnees
    include "../classes/connexiondb.php";
    // preparation de la requette
    $requette = $connexion->prepare("INSERT INTO voitures (marque, modele, categorie, prix, statut, image, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $requette->execute(array($this->marque, $this->modele, $this->categorie, $this->prix, $this->statut, $this->image, $this->description));
  }


  // methode pour recuperer l'ensemble des voitures
  public static function listeVoiture(){
    // etablir la connexion à la base de donnees
    include $_SERVER["DOCUMENT_ROOT"].'/location/classes/connexiondb.php';
    // preparation de la requette
    $req = $connexion->prepare("SELECT * FROM voitures");
    // executer la requette
    $req->execute();
    return $req->fetchAll();
  }

  // methode pour recuperer les informafions de la voiture selectionner
  public static function detailsVoiture($id){
    // etablir la connexion à la base de donnees
    include $_SERVER["DOCUMENT_ROOT"].'/location/classes/connexiondb.php';
    // preparer la requette
    $request = $connexion->prepare("SELECT * FROM voitures WHERE id_voiture = ?");
    // executer la requette
    $request->execute(array($id));
    // retourner le resultat de la requette
    return $request->fetch();
  }

}