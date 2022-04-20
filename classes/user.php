<?php
// include("connexiondb.php");

class User{
  private $nom;
  private $prenom;
  private $email;
  private $password;

  // constucteur de la classe
  public function __construct($n, $p, $e, $pwd){
    $this->nom = $n;
    $this->prenom = $p;
    $this->email = $e;
    $this->password = $pwd;
  }

  // fonction pour enregistrer un utilisateur dans la base de données
  public function inscription(){
    // etablir la connexion à la base de donnees
    // $connexion = new PDO('mysql:host=localhost;dbname=location', "admin", "passer");
    include "connexiondb.php";
    // creer la requette
    $req = $connexion->prepare("INSERT INTO users (nom, prenom, email, password, type) VALUES (?,?, ?, ?, ?)");
    $req->execute(array($this->nom, $this->prenom, $this->email, $this->password, "client"));
  }


  // fonction permettant à lutilisateur de se connecter
  public static function connexion($email, $password){
    // etablir la connexion à la base de donnees
    include "connexiondb.php";
    // preparation de la requette
    $req = $connexion->prepare("SELECT * FROM users WHERE email=? AND password=?");
    // execution de la requette
    $req->execute(array($email, $password));
    // recuperation du resultat de la requette dans un tableau
    $user = $req->fetch();

    return $user;
  }
}