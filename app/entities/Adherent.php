<?php

/**
* 
*/
class Adherent extends Demandeur {
{
	private $id_adherent;
  private $id_club;



  //fonction constructeur avec hydrater
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


  // Getter
  	function get_id_adherent() 
  	{
   		return $this->id_adherent;
  	}

    function get_id_club() 
    {
      return $this->id_club;
    }


 	// Setter
  	function set_id_adherent($id_adherent) 
    {
  	  $this->id_adherent = $id_adherent;
  	}

    function set_id_club($id_club) 
    {
      $this->id_club = $id_club;
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


































}