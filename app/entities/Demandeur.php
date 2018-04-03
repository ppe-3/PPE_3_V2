<?php


class Demandeur {

  private $id_demandeur = null;     
  private $nom_demandeur = null;           
  private $prenom_demandeur = null;     
  private $rue_demandeur = null;      
  private $cp_demandeur = null;    
  private $ville_demandeur = null;            
  private $mdp_demandeur = null;            
  private $mail_demandeur = null;       
  private $datenaissance_demandeur = null;       
  private $sexe_demandeur = null;
  private $repre_demandeur = null;     

  

  function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

  // Getter

  function get_id_demandeur() {
    return $this->id_demandeur;
  }

  function get_nom_demandeur() {
    return $this->nom_demandeur;
  }

  function get_prenom_demandeur() {
    return $this->prenom_demandeur;
  }

  function get_rue_demandeur() {
    return $this->rue_demandeur;
  }

  function get_cp_demandeur() {
    return $this->cp_demandeur;
  }


  function get_ville_demandeur() {
    return $this->ville_demandeur;
  }

  
  function get_mdp_demandeur() {
    return $this->mdp_demandeur;
  }

  function get_mail_demandeur() {
    return $this->mail_demandeur;
  }

  
  function get_datenaissance_demandeur() {
    return $this->datenaissance_demandeur;
  }


  function get_sexe_demandeur() {
    return $this->sexe_demandeur;
  }

  function get_repre_demandeur() {
    return $this->repre_demandeur;
  }


  function set_id_demandeur($id_demandeur) {
    $this->id_demandeur = $id_demandeur;
  }

  function set_nom_demandeur($nom_demandeur) {
    $this->nom_demandeur = $nom_demandeur;
  }

  function set_prenom_demandeur($prenom_demandeur) {
    $this->prenom_demandeur = $prenom_demandeur;
  }

  function set_rue_demandeur($rue_demandeur) {
   $this->rue_demandeur = $rue_demandeur;
    } 
   

  function set_cp_demandeur($cp_demandeur) {
    $this->cp_demandeur = $cp_demandeur;
  }

  function set_ville_demandeur($ville_demandeur) {
    $this->ville_demandeur = $ville_demandeur;
  }

  function set_mdp_demandeur($mdp_demandeur) {
    $this->mdp_demandeur = $mdp_demandeur;
  }

  function set_mail_demandeur($mail_demandeur) {
    $this->mail_demandeur = $mail_demandeur;
  }

  function set_datenaissance_demandeur($datenaissance_demandeur) {
    $this->datenaissance_demandeur = $datenaissance_demandeur;
  }

  function set_sexe_demandeur($sexe_demandeur) {
    $this->sexe_demandeur = $sexe_demandeur;
  }

  function set_repre_demandeur($repre_demandeur) {
    $this->repre_demandeur = $repre_demandeur;
  }

function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}