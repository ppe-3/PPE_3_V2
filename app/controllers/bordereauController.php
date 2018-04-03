<?php
include_once ROOT.'/app/entities/dao/BordereauDAO.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';


if(@$_SESSION['id'] == null)
{
	echo 'pas connecté';
}
else
{

     $Note_de_fraisDAO= new Note_de_fraisDAO;
     $rows=$Note_de_fraisDAO->find($_SESSION['id']); 
     

         foreach ($rows as $row) 
              {

                echo('<p><a href="ligneDeFrais.php?annee='. $row->get_annee() .'&user='.$row->get_id_demandeur(). '" >bordereaux</a>' . $row->get_id_note_de_frais() .'  '.$row->get_annee());
                echo('<br>'); 

              }


              if (empty($rows)){
              	echo ("<p>Vous n'avez aucun borderaux .");
              }
}
