<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';

$id =$_SESSION['id'];

$datetrajet 	= isset($_POST['datetrajet']) ? $_POST['datetrajet'] : '';
$trajet 		= isset($_POST['trajet']) ? $_POST['trajet'] : '';
$km             = isset($_POST['km']) ? $_POST['km'] : '';
$ct 			= isset($_POST['ct']) ? $_POST['ct'] : '';
$cp 			= isset($_POST['cp']) ? $_POST['cp'] : '';
$cr 			= isset($_POST['cr']) ? $_POST['cr'] : '';
$ch             = isset($_POST['ch']) ? $_POST['ch'] : '';
$submit 		= isset($_POST['submit']) ? $_POST['submit'] : '';


if($submit){



						  $ligneDeFraisDAO= new LignefraisDAO;
						  $ligneDeFraisDAO->insert_ligne_de_frais($datetrajet,$trajet,$km,$cp,$cr,$ch,$id);

	    header('Location:ligneDeFrais.php?annee='.date("Y").'&user='.$id);
}
