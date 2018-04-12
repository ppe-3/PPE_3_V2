<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/AdherentDAO.php';

$numlicense_adherent = $_GET['id'];

$AdherentDAO= new AdherentDAO;
$AdherentDAO->delete_adherent($numlicense_adherent);


 header('Location:adherents.php?user='.$_SESSION['id']);