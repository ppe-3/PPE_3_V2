<?php
include_once '../../inc/hashage.php';
include_once '../entities/dao/DemandeurDAO.php';
include_once '../entities/Demandeur.php';


$submit 			= isset($_POST['submit']) ? $_POST['submit'] : '';
$old_password		= isset($_POST['old_password']) ? $_POST['old_password'] : '';
$new_password 		= isset($_POST['new_password']) ? $_POST['new_password'] : '';
$new_password_2		= isset($_POST['new_password_2']) ? $_POST['new_password_2'] : '';

if($submit)
{


	if($new_password != $new_password_2)
	{
		echo "Les nouveau mot de passe ne correspond pas avec la vérification";
	}	
	else
	{
		$daoDemandeur = new DemandeurDAO();
		$demandeur = $daoDemandeur->findByPassword($old_password);
		$demandeur->set_mdp_demandeur($new_password);
		$daoDemandeur->updateDemandeur($demandeur->get_mdp_demandeur(), $demandeur->get_id_demandeur());
        header('Location: ../../index.php');

	}
}
