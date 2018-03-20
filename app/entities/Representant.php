<?php

/**
* 
*/
class Representant extends Demandeur  {
	private $id_representant;






  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


  // Getter
  	function get_id_representant() 
  	{
   		return $this->id_representant;
  	}

 	// Setter
  	function set_id_representant($id_representant) 
    {
  	  $this->id_representant = $id_representant;
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