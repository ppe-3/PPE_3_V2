<?php
include_once ROOT.'/inc/hashage.php';
include_once ROOT.'/app/entities/dao/DemandeurDAO.php';
include_once ROOT.'/app/entities/Demandeur.php';


$submit 			= isset($_POST['submit']) ? $_POST['submit'] : '';
$old_password		= isset($_POST['old_password']) ? $_POST['old_password'] : '';
$new_password 		= isset($_POST['new_password']) ? $_POST['new_password'] : '';
$new_password_2		= isset($_POST['new_password_2']) ? $_POST['new_password_2'] : '';

if($submit)
{


	if($new_password != $new_password_2)
	{
		echo "Confirmation du mot de passe incorect";
	}	
	else
	{
		$daoDemandeur = new DemandeurDAO();
		$demandeur = $daoDemandeur->findByPassword($old_password);
		$demandeur->set_mdp_demandeur($new_password);
		$daoDemandeur->updateDemandeur($demandeur->get_mdp_demandeur(), $demandeur->get_id_demandeur());
        header('Location: index.php?user='.$_SESSION['id']);	

	}
}
