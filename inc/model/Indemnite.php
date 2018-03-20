<?php

class Indemnite {


	private $annee_indemnite; //Id de l'indemnite
  private $tarifkilometrique_indemnite; //Tarif kilometrique
	

	
//Constructeur

function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

//Getter

function get_annee_indemnite() {
    return $this->annee_indemnite;
  }
  
function get_tarifkilometrique_indemnite() {
    return $this->tarifkilometrique_indemnite;
  }
  

//Setter


function set_annee_indemnite($annee_indemnite) {
    $this->annee_indemnite = $annee_indemnite;
  }
  
function set_tarifkilometrique_indemnite($tarifkilometrique_indemnite) {
    $this->tarifkilometrique_indemnite = $tarifkilometrique_indemnite;
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