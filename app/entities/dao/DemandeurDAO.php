<?php

//include_once '../entities/Demandeur.php';
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
      $sth->execute(array(":mail_demandeur" => $mail_demandeur ,":motdepasse_demandeur"=>$motdepasse_demandeur));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
     
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

    $Demandeur = new Demandeur($row);


    return $Demandeur; // Retourne l'objet métier
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
  


}



