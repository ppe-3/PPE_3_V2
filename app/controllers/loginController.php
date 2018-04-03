<?php
include_once ROOT.'/inc/hashage.php';
include_once ROOT.'/app/entities/dao/DemandeurDAO.php';
include_once ROOT.'/app/entities/Demandeur.php';

$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$passe = isset($_POST['passe']) ? $_POST['passe'] : '';

if($submit)
{
      $daoDemandeur = new DemandeurDAO();
      $demandeur = $daoDemandeur->find($mail, $passe);

      if($demandeur->get_id_demandeur() < 1)
      {
            echo('Mot de passe incorect');
      }
      else
      {
            session_start();
            $_SESSION['id'] = $demandeur->get_id_demandeur();
            $_SESSION['nom_demandeur'] = $demandeur->get_nom_demandeur();
            $_SESSION['prenom_demandeur'] = $demandeur->get_prenom_demandeur();
            $_SESSION['rue_demandeur'] = $demandeur->get_rue_demandeur();
            $_SESSION['cp_demandeur'] = $demandeur->get_cp_demandeur();
            $_SESSION['ville_demandeur'] = $demandeur->get_ville_demandeur();
            $_SESSION['mail_demandeur'] = $demandeur->get_mail_demandeur();
            $_SESSION['datenaissance_demandeur'] = $demandeur->get_datenaissance_demandeur();
            $_SESSION['sexe_demandeur'] = $demandeur->get_sexe_demandeur();

            header('Location: index.php');
      }
}

?>