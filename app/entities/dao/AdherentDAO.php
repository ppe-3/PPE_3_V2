<?php
include_once 'src/init.php';
include_once ROOT.'/app/entities/Adherent.php';

class AdherentDAO {

  private static $connexion; // Objet de connexion

  /**
   * Méthode statique de connexion
   * @return type
   * @throws Exception
   */

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

  

  function find($numlicense_adherent) {
    $sql = "select * from adherent where numlicense_adherent=:numlicense_adherent";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":numlicense_adherent" => $numlicense_adherent));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $adherent = new Adherent($row);

        $tableau[] = $adherent;

    return $tableau;    // Retourne un tableau d'objets
  }



  function findModifier($numlicense_adherent) {
    $sql = "select * from adherent where numlicense_adherent=:numlicense_adherent";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":numlicense_adherent" => $numlicense_adherent));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $adherent = new Adherent($row);


    return $adherent;    
  }






  function findByDemandeur($id_demandeur) {
    $sql = "select * from adherent where id_demandeur=:id_demandeur and mineur = 1";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_demandeur" => $id_demandeur));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
     $tableau = array() ;
      foreach ($rows as $row) {
        $adherent = new Adherent($row);

        $tableau[] = $adherent;

    }

    return $tableau;    // Retourne un tableau d'objets
  }


  
  function findAll() {
    $sql = "select * from adherent";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $adherent = new Adherent($row);
      
      $tableau[] = $adherent;
    }
    return $tableau; // Retourne un tableau d'objets
  }




  function insert_adherent($numlicense_adherent, $id_demandeur, $nom_ad, $prenom_ad, $date_naissance_ad, $mineur) {
    $sql = 'INSERT INTO adherent(numlicense_adherent, id_demandeur, nom_ad, prenom_ad, date_naissance_ad, mineur) VALUES (:numlicense_adherent, :id_demandeur,:nom_ad, :prenom_ad, :date_naissance_ad, :mineur)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":numlicense_adherent"=>$numlicense_adherent,
        ":id_demandeur"       =>$id_demandeur,      
        ":nom_ad"             =>$nom_ad,
        ":prenom_ad"          =>$prenom_ad,
        ":date_naissance_ad"  =>$date_naissance_ad,
        "mineur"              =>$mineur
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    
      return $sth;
  }



  function update_adherent($numlicense_adherent, $nom_ad, $prenom_ad, $date_naissance_ad) {
  $sql = "UPDATE adherent SET nom_ad = :nom_ad, prenom_ad = :prenom_ad, date_naissance_ad = :date_naissance_ad WHERE numlicense_adherent=:numlicense_adherent ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
        ":nom_ad"             =>$nom_ad,
        ":prenom_ad"          =>$prenom_ad,
        ":date_naissance_ad"  =>$date_naissance_ad,
        ":numlicense_adherent"=>$numlicense_adherent
        ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre d'insertion
  }




  function delete_adherent($numlicense_adherent) {
    $sql = "DELETE FROM adherent WHERE numlicense_adherent =:numlicense_adherent ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":numlicense_adherent" => $numlicense_adherent));
   
  }


}























