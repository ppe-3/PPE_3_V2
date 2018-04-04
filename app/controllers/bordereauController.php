<?php
include ROOT.'/inc/connexion_bd.inc.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/BordereauDAO.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';

$message="";

if(@$_SESSION['id'] == null)
{
	$message="vous n'avez pas de borderaux ";
}
else
{

     $Note_de_fraisDAO= new Note_de_fraisDAO;
     $rows=$Note_de_fraisDAO->find($_SESSION['id']); 
     

}
