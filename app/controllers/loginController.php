<?php
include_once '../../inc/hashage.php';
include_once '../entities/dao/DemandeurDAO.php';
include_once '../entities/Demandeur.php';

$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$passe = isset($_POST['passe']) ? $_POST['passe'] : '';
       
if ($submit)
{
	$crypt = hashage($passe);   
	$demandeurDAO = new DemandeurDAO();
	$user = $demandeurDAO->find($mail,$crypt);
      if($user->get_id_demandeur() > 0)
      {
            $_SESSION['id'] = $user->get_id_demandeur();
            $_SESSION['nom'] = $user->get_nom_demandeur();
            $_SESSION['prenom'] = $user->get_prenom_demandeur();
            $_SESSION['rue'] = $user->get_rue_demandeur();
            $_SESSION['cp'] = $user->get_cp_demandeur();
            $_SESSION['ville'] = $user->get_ville_demandeur();
            $_SESSION['mdp'] = $user->get_mdp_demandeur();
            $_SESSION['mail'] = $user->get_mail_demandeur();
            $_SESSION['datenaissance'] = $user->get_datenaissance_demandeur();
            $_SESSION['sexe'] = $user->get_sexe_demandeur(); 
            header('Location: ../../index.php');

      }
      else
      {
            
      }

}
?>