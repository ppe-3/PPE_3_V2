<?php
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/BordereauDAO.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';

$id = $_GET['id'];




 $Note_de_fraisDAO= new Note_de_fraisDAO;
 $Note_de_fraisDAO->insert_bordereau($id);

 echo('lololololol');

 header('Location: listeBordereaux.php ');
