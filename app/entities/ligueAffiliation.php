<?php

class Ligue {


	private $id_ligue; //Id de la ligue
  private $libelle_ligue; //Libelle de la ligue
	

	
//Constructeur


function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }
//Getter

function get_id_ligue() {
    return $this->id_ligue;
  }
  
function get_libelle_ligue() {
    return $this->libelle_ligue;
  }
  

//Setter


function set_id_ligue($id_ligue) {
    $this->id_ligue = $id_ligue;
  }
  
function set_libelle_ligue($libelle_ligue) {
    $this->libelle_ligue = $libelle_ligue;
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