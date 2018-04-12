<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/AdherentDAO.php';

$numlicense_adherent = $_GET['id'];

$AdherentDAO= new AdherentDAO;
$adherent=$AdherentDAO->findModifier($numlicense_adherent);


$numlicense_adherent 	 = isset($_POST['numlicense_adherent']) ? $_POST['numlicense_adherent'] : '';
$nom_ad    				 = isset($_POST['nom_ad']) ? $_POST['nom_ad'] : '';
$prenom_ad          	 = isset($_POST['prenom_ad']) ? $_POST['prenom_ad'] : '';
$date_naissance_ad       = isset($_POST['date_naissance_ad']) ? $_POST['date_naissance_ad'] : '';
$submit    				 = isset($_POST['submit']) ? $_POST['submit'] : '';


if($submit){

$AdherentDAO= new AdherentDAO;
$AdherentDAO->update_adherent($numlicense_adherent, $nom_ad, $prenom_ad, $date_naissance_ad);
var_dump($AdherentDAO);

header('Location:adherents.php?user='.$_SESSION['id']);
}