<?php

include_once ROOT.'/inc/hashage.php';
include_once ROOT.'/app/entities/Demandeur.php';

class DemandeurDAO {

  private static $connexion; // Objet de connexion

  private static function get_connexion() {
    if (self::$connexion === null) {
      // Récupération des paramètres de configuration BD
      $user = 'root';
      $pass = '';
      $host = 'localhost';
      $base = 'fredi';
      $dsn = 'mysql:host=' . $host . ';dbname=' . $base;
      // Création de la connexion
      try {
        self::$connexion = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
      }
    }
    return self::$connexion;
  }

  function find($mail_demandeur,$motdepasse_demandeur) {
    $sql = "select * from demandeur where mail_demandeur=:mail_demandeur and motdepasse_demandeur=:motdepasse_demandeur";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":mail_demandeur" => $mail_demandeur ,":motdepasse_demandeur"=>hashage($motdepasse_demandeur)));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
     
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    if(!$row)
    {
      $demandeur = new Demandeur();
    }
    else
    {
      $demandeur = new Demandeur($row);  
    }
    return $demandeur; // Retourne l'objet métier
  }

    function findByMail($mail_demandeur) {
    $sql = "select * from demandeur where mail_demandeur=:mail_demandeur LIMIT 1";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":mail_demandeur" => $mail_demandeur));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
     
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    if(!$row)
    {
      $demandeur = new Demandeur();
    }
    else
    {
      $demandeur = new Demandeur($row);  
    }
    return current($demandeur); // Retourne l'objet métier
  }

    function findByPassword($motdepasse_demandeur) {
    $sql = "select * from demandeur where motdepasse_demandeur = :motdepasse_demandeur";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":motdepasse_demandeur" => hashage($motdepasse_demandeur)));
      $row = $sth->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    } 
    if(!$row)
    {
      $demandeur = new Demandeur();
    }
    else
    {
      $demandeur = new Demandeur($row);  
    }
    return $demandeur; // Retourne l'objet métier
  }

    function findByID($id_demandeur) {
    $sql = "select * from demandeur where id_demandeur = :id_demandeur";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_demandeur" => $_SESSION['id']));
      $row = $sth->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    } 
    if(!$row)
    {
      $demandeur = new Demandeur();
    }
    else
    {
      $demandeur = new Demandeur($row);  
    }
    return $demandeur; // Retourne l'objet métier
  }


  function findAll() {
    $sql = "select * from demandeur";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $demandeur = new demandeur($row);
      
      $tableau[] = $demandeur;
    }
    return $tableau; // Retourne un tableau d'objets
  }
/* 

* Fonction insert de demandeur

*/
  function insert_demandeur(array $demandeur_object) {
    $sql = "INSERT INTO demandeur(nom_demandeur, prenom_demandeur, rue_demandeur, cp_demandeur, ville_demandeur, motdepasse_demandeur, mail_demandeur, datenaissance_demandeur, sexe_demandeur, repre_demandeur) VALUES (:nom_demandeur, :prenom_demandeur, :rue_demandeur , :cp_demandeur, :ville_demandeur, :motdepasse_demandeur, :mail_demandeur, :datenaissance_demandeur, :sexe_demandeur, :repre_demandeur)";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute($demandeur_object);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre d'insertion
  }

  function updateDemandeur($motdepasse_demandeur, $id_demandeur) {
    $sql = "update demandeur set motdepasse_demandeur=:motdepasse_demandeur where id_demandeur=:id_demandeur";
    $sth = self::get_connexion()->prepare($sql);
    $sth->execute(array(":motdepasse_demandeur" => hashage($motdepasse_demandeur),":id_demandeur" => $id_demandeur));
  }
}





