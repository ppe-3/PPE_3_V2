<?php

class Club {


	private $id_club; //Id du club
	private $nom_club; //Nom du club
	private $adresse_club; //Adresse du club
	private $cp_club; //Code Postal du club
	private $ville_club; //Ville du club
	private $sigle_club; //Sigle du club
	

	
//Constructeur


function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }
//Getter

function get_id_club() {
    return $this->id_club;
  }
  
function get_nom_club() {
    return $this->nom_club;
  }
  
function get_adresse_club() {
    return $this->adresse_club;
  }
  
function get_cp_club() {
    return $this->cp_club;
  }
  
function get_ville_club() {
    return $this->ville_club;
  }
  
function get_sigle_club() {
    return $this->sigle_club;
  }

//Setter

function set_id_club($id_club) {
    $this->id_club = $id_club;
  }
  
function set_nom_club($nom_club) {
    $this->nom_club = $nom_club;
  }
  
function set_adresse_club($adresse_club) {
    $this->adresse_club = $adresse_club;
  }
  
function set_cp_club($cp_club) {
    $this->cp_club = $cp_club;
  }
  
function set_ville_club($ville_club) {
    $this->ville_club = $ville_club;
  }
  
function set_sigle_club($sigle_club) {
    $this->sigle_club = $sigle_club;
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