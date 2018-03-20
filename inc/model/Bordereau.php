<?php

/**
* 
*/
class Note_de_frais  //attribut de la classe note de frais
{
	private $id_note_de_frais;
  private $id_demandeur;
  private $annee;


  

  //fonction constructeur avec hydrater
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


  // Getter
  	function get_id_note_de_frais() 
  	{
   		return $this->id_note_de_frais;
  	}
    
    function get_id_demandeur() 
    {
      return $this->id_note_de_frais;
    }
     function get_annee() 
    {
      return $this->annee;
    }



 	// Setter
  	function set_id_note_de_frais($id_note_de_frais) 
    {
  	  $this->id_note_de_frais = $id_note_de_frais;
  	}

    function set_id_demandeur($id_demandeur) 
    {
      $this->id_demandeur = $id_demandeur;
    }

    
    function set_annee($annee) 
    {
      $this->annee = $annee;
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
