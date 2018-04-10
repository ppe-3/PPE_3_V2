<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';

$idLigne = $_GET['id'];

$ligneDeFraisDAO= new LignefraisDAO;
$ligne=$ligneDeFraisDAO->find($idLigne);

$datetrajet 	= isset($_POST['datetrajet']) ? $_POST['datetrajet'] : '';
$trajet 		= isset($_POST['trajet']) ? $_POST['trajet'] : '';
$km             = isset($_POST['km']) ? $_POST['km'] : '';
$ct 			= isset($_POST['ct']) ? $_POST['ct'] : '';
$cp 			= isset($_POST['cp']) ? $_POST['cp'] : '';
$cr 			= isset($_POST['cr']) ? $_POST['cr'] : '';
$ch             = isset($_POST['ch']) ? $_POST['ch'] : '';
$submit 		= isset($_POST['submit']) ? $_POST['submit'] : '';
$idLigne        = isset($_POST['idLigne']) ? $_POST['idLigne'] : '';





if($submit){

$id = $_SESSION['id'];	

$ligneDeFraisDAO= new LignefraisDAO;
$ligneDeFraisDAO->update_ligne_de_frais($idLigne,$datetrajet,$trajet,$km,$cp,$cr,$ch,$id);


	    header('Location:ligneDeFrais.php?annee='.date("Y").'&user='.$id);

}