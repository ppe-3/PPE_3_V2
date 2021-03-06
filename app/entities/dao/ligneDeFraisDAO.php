<?php
include_once 'src/init.php';
include_once ROOT.'/app/entities/ligneDeFrais.php';

class LignefraisDAO {

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

  


  function find($id_lignefrais) {
    $sql = "select * from lignefrais where id_lf=:id_lignefrais";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_lignefrais" => $id_lignefrais));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $lignefrais = new Lf($row);

  
    return $lignefrais; 
  }

  
  function findAll() {
    $sql = "select * from lignefrais";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $lignefrais = new Lf($row);
      
      $tableau[] = $lignefrais;
    }
    return $tableau; // Retourne un tableau d'objets
  }
  
 function findby($id_demandeur,$annee) {
    $sql = "select * from lignefrais where id_demandeur=:id_demandeur and annees=:annee";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_demandeur" => $id_demandeur,":annee" => $annee));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
       }
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Lf($row);
    }
    return $tableau; // Retourne un tableau d'objets
  }

  function delete($id) {
    $sql = "DELETE FROM lignefrais WHERE id_lf =:id ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id" => $id));
   
  }

  function insert_ligne_de_frais($datetrajet_lf,$trajet_lf,$km_lf,$coutpeage_lf,$coutrepas_lf,$couthebergement_lf,$id_demandeur) {
  $sql = "INSERT INTO lignefrais(datetrajet_lf,  trajet_lf, km_lf, coutpeage_lf, coutrepas_lf, couthebergement_lf, id_demandeur, annees) VALUE(:datetrajet, :trajet , :km, :cp, :cr, :ch, :id, :annees )";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
            ':datetrajet'            => $datetrajet_lf,
            ':trajet'                => $trajet_lf,
            ':km'                    => $km_lf,
            ':cp'                    => $coutpeage_lf,
            ':cr'                    => $coutrepas_lf,
            ':ch'                    => $couthebergement_lf,
            ':id'                    => $id_demandeur,
            ':annees'                => date("Y") 
        ));    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre d'insertion
  }
 
 function findtarif($annee_indemnite){
$sql = "select tarifkilometrique_indemnite from indemnite where annee_indemnite = :annee_indemnite";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":annee_indemnite" => $annee_indemnite));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
        return $row['tarifkilometrique_indemnite'];
 }




function update_ligne_de_frais($idLigne,$datetrajet_lf,$trajet_lf,$km_lf,$coutpeage_lf,$coutrepas_lf,$couthebergement_lf,$id_demandeur) {
  $sql = "UPDATE lignefrais SET datetrajet_lf=:datetrajet,  trajet_lf = :trajet, km_lf = :km, coutpeage_lf = :cp, coutrepas_lf = :cr , couthebergement_lf = :ch, id_demandeur = :id, annees = :annees WHERE id_lf=:id_lignefrais ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
            ':id_lignefrais'         => $idLigne,
            ':datetrajet'            => $datetrajet_lf,
            ':trajet'                => $trajet_lf,
            ':km'                    => $km_lf,
            ':cp'                    => $coutpeage_lf,
            ':cr'                    => $coutrepas_lf,
            ':ch'                    => $couthebergement_lf,
            ':id'                    => $id_demandeur,
            ':annees'                => date("Y") 
        ));    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  // Retourne le nombre d'insertion
  }




}