<?php
include_once 'src/init.php';
include_once ROOT.'/app/entities/Bordereau.php';

class Note_de_fraisDAO  
{

private static $connexion; 


  
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
  



    function find($id_Demandeur) {
    $sql = "select * from bordereau where id_demandeur = :id_Demandeur ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_Demandeur" => $id_Demandeur));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
       }
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Note_de_frais($row);
    }
    return $tableau; // Retourne un tableau d'objets
  }



 function findByCurrentYear($id_demandeur) {
    $sql = "select * from lignefrais where id_demandeur=:id_demandeur and annees=:annee";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_demandeur" => $id_demandeur,":annee" => date("Y")));
      $row = $sth->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
       }
  
      $Bordereau = new Lf($row);
    
    return $Bordereau; // Retourne un objet bordereau
  }





 function insert_bordereau($id_demandeur) {
    $sql = "INSERT INTO bordereau(annee, id_demandeur) VALUES (:annee, :id_demandeur)";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(":id_demandeur" => $id_demandeur ,":annee" => date("Y") ));
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
  }


  function hydrater(array $tableau) 
  {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }



}