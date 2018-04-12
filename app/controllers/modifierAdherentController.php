<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/AdherentDAO.php';

$id_adherent = $_GET['id'];

$AdherentDAO= new AdherentDAO;
$adherent=$AdherentDAO->findModifier($id_adherent);


$numlicense_adherent 	 = isset($_POST['numlicense_adherent']) ? $_POST['numlicense_adherent'] : '';
$nom_ad    				 = isset($_POST['nom_ad']) ? $_POST['nom_ad'] : '';
$prenom_ad          	 = isset($_POST['prenom_ad']) ? $_POST['prenom_ad'] : '';
$date_naissance_ad       = isset($_POST['date_naissance_ad']) ? $_POST['date_naissance_ad'] : '';
$mineur      			 = isset($_POST['mineur']) ? $_POST['mineur'] : '';
$submit    				 = isset($_POST['submit']) ? $_POST['submit'] : '';


if($submit){

echo('lol');

$AdherentDAO= new AdherentDAO;
$AdherentDAO->update_adherent($_SESSION['id'], $nom_ad, $prenom_ad, $date_naissance_ad, $mineur);
var_dump($AdherentDAO);

header('Location:adherents.php?user='.$_SESSION['id']);
}