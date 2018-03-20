<?php



include_once "inc/model/Adherent.php";
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

  


  function find($id_Adhenrent) {
    $sql = "select * from adherent where id_Adhenrent=:id_Adhenrent";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_Adhenrent" => $id_Adhenrent));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $adherent = new adherent($row);
    // Récupère les données du Ferry
  
    return $adherent; // Retourne l'objet métier
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
      $adherent = new adherent($row);
      
      $tableau[] = $adherent;
    }
    return $tableau; // Retourne un tableau d'objets
  }
  


}























