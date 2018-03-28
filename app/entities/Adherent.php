<?php

/**
* 
*/
class Adherent  {
{
	private $numlicense_adherent;
  private $nom_ad;
  private $prenom_ad;
  private $date_naissance_ad;
  private $mineur;




  //fonction constructeur avec hydrater
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


  // Getter
  	function get_id() 
  	{
   		return $this->numlicense_adherent;
  	}

    function get_nom_adherent() 
    {
      return $this->nom_adherent;
    }

     function get_prenom_adherent() 
    {
      return $this->prenom_adherent;
    }

     function get_date_naissance_adherent() 
    {
      return $this->date_naissance_adherent;
    }

     function get_mineur() 
    {
      return $this->mineur;
    }


 	// Setter
  	function set_id($numlicense_adherent) 
    {
  	  $this->numlicense_adherent = $numlicense_adherent;
  	}

    function set_nom_adherent($nom_adherent) 
    {
      $this->nom_adherent = $nom_adherent;
    }

    function set_prenom_adherent($prenom_adherent) 
    {
      $this->prenom_adherent = $prenom_adherent;
    }

    function set_date_naissance_adherent($date_naissance_adherent) 
    {
      $this->date_naissance_adherent = $date_naissance_adherent;
    }


    function set_mineur($mineur) 
    {
      $this->mineur = $mineur;
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