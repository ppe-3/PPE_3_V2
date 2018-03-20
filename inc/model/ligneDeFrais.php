<?php

class Lf {


	private $id_lf; //Id de la ligne de frais
	private $datetrajet_lf; //Date tu trajet
  private $trajet_lf;
	private $km_lf; //Kilometres
	private $coutpeage_lf; //cout des peages
	private $coutrepas_lf; //Cout des repas
	private $couthebergement_lf; //Cout de l'hebergement
  private $annees;
  private $id_notefrais;
  private $notefrais;
	

	
//Constructeur


function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }
//Getter

function get_id_lf() {
    return $this->id_lf;
  }
  
function get_datetrajet_lf() {
    return $this->datetrajet_lf;
  }

  function get_trajet_lf() {
    return $this->trajet_lf;
  }
  
function get_km_lf() {
    return $this->km_lf;
  }
  
function get_coutpeage_lf() {
    return $this->coutpeage_lf;
  }
  
function get_coutrepas_lf() {
    return $this->coutrepas_lf;
  }
  
function get_couthebergement_lf() {
    return $this->couthebergement_lf;
  }

  function get_annees() {
    return $this->annees;
  }


function get_id_notefrais() {
   return $this->id_notefrais;
  }

function get_notefrais() {
   return $this->id_notefrais;
  }

//Setter

function set_id_lf($id_lf) {
    $this->id_lf = $id_lf;
  }
  
function set_datetrajet_lf($datetrajet_lf) {
    $this->datetrajet_lf = $datetrajet_lf;
  }


  function set_trajet_lf($trajet_lf) {
    $this->trajet_lf = $trajet_lf;
  }
  
function set_km_lf($km_lf) {
    $this->km_lf = $km_lf;
  }
  
function set_coutpeage_lf($coutpeage_lf) {
    $this->coutpeage_lf = $coutpeage_lf;
  }
  
function set_coutrepas_lf($coutrepas_lf) {
    $this->coutrepas_lf = $coutrepas_lf;
  }
  
function set_couthebergement_lf($couthebergement_lf) {
    $this->couthebergement_lf = $couthebergement_lf;
  }

  function set_annees($annees) {
    $this->annees = $annees;
  }

function set_id_notefrais($id_notefrais) {
    $this->id_notefrais = $id_notefrais;
  }  

function set_notefrais($notefrais) {
    $this->notefrais = $notefrais;
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