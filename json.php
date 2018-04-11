<?php
include_once 'src/init.php';
include_once ROOT.'/app/controllers/jsonController.php';
include_once ROOT.'/inc/fonctions.inc.php';


// Frediserver - Serveur web service RESTful

// Récupère les paramètres dans l'URL
$user = isset($_GET["user"]) ? $_GET["user"] : "";
$password = isset($_GET["password"]) ? $_GET["password"] : "";
$trouve = null;
	


	  $daoDemandeur = new DemandeurDAO();
      $demandeur = $daoDemandeur->find($user, $password);

      if($demandeur->get_id_demandeur() < 1)
      {
         
         	$lesLignes = "Pas de lignes";
			$token = null;
           
         
      }
      else
      {
            $_SESSION['id'] = $demandeur->get_id_demandeur();
            $_SESSION['nom_demandeur'] = $demandeur->get_nom_demandeur();
            $_SESSION['prenom_demandeur'] = $demandeur->get_prenom_demandeur();
            $_SESSION['rue_demandeur'] = $demandeur->get_rue_demandeur();
            $_SESSION['cp_demandeur'] = $demandeur->get_cp_demandeur();
            $_SESSION['ville_demandeur'] = $demandeur->get_ville_demandeur();
            $_SESSION['mail_demandeur'] = $demandeur->get_mail_demandeur();
            $_SESSION['datenaissance_demandeur'] = $demandeur->get_datenaissance_demandeur();
            $_SESSION['sexe_demandeur'] = $demandeur->get_sexe_demandeur();
                

             

     		 	$ligneDeFraisDAO= new LignefraisDAO;
				$LesLignefrais = $ligneDeFraisDAO->findby($_SESSION['id'],date("Y")); 

				foreach ($LesLignefrais as $ligne) {
					$myLigne = array(
					  "id_Ligne" => $ligne->get_id_lf(), 
					  "Date" => $ligne->get_datetrajet_lf(), 
					  "Km" => $ligne->get_km_lf(), 
					  "CoutPeage" => $ligne->get_coutpeage_lf(),  
					  "CoutRepas" => $ligne->get_coutrepas_lf(), 
					  "CoutHebergement" => $ligne->get_couthebergement_lf(),  
					  "Trajet" => $ligne->get_trajet_lf(),  
					  "Annee" => $ligne->get_annees()   			   
					);
					$trouve[] = $myLigne;
				}
				//var_dump($trouve);
				if($trouve != null){
			
				$lesLignes = $trouve;
				}

				else {
				$lesLignes = "aucune ligne dans l'année courante";
				}
				// Crée un token aléatoire (<PHP7)
		 		$token = bin2hex(openssl_random_pseudo_bytes(15));
				 // Ajoute le token au fichier des tokens
		 		add_token($token);
            	
           
            
      } 
      $json = build_json($lesLignes, $token); 
		send_json($json);