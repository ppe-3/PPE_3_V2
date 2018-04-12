<?php
include ROOT.'/inc/connexion_bd.inc.php';
include_once ROOT.'/app/entities/dao/AdherentDAO.php';



$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$daoAdherents = new AdherentDAO();
$Adherents=$daoAdherents->findByDemandeur($id);




?>