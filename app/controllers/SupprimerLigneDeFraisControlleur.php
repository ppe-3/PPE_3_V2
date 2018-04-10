<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';

$idLigne = $_GET['id'];

$ligneDeFraisDAO= new LignefraisDAO;
$ligne=$ligneDeFraisDAO->delete($idLigne);


 header('Location:ligneDeFrais.php?annee='.date("Y").'&user='.$_SESSION['id']);