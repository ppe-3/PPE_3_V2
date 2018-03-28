<?php

/**
* 
*/
class Adherent extends Demandeur {
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
  	function get_numlicense_adherent() 
  	{
   		return $this->numlicense_adherent;
  	}

    function get_nom_ad() 
    {
      return $this->nom_ad;
    }

     function get_prenom_ad() 
    {
      return $this->prenom_ad;
    }

     function get_date_naissance_ad() 
    {
      return $this->date_naissance_ad;
    }

     function get_mineur() 
    {
      return $this->mineur;
    }


 	// Setter
  	function set_numlicense_adherent($numlicense_adherent) 
    {
  	  $this->numlicense_adherent = $numlicense_adherent;
  	}

    function set_nom_ad($nom_ad) 
    {
      $this->nom_ad = $nom_ad;
    }

    function set_prenom_ad($prenom_ad) 
    {
      $this->prenom_ad = $prenom_ad;
    }

    function set_date_naissance_ad($date_naissance_ad) 
    {
      $this->date_naissance_ad = $date_naissance_ad;
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