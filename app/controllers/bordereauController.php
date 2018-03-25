<?php
include_once '../entities/dao/BordereauDAO.php';
include_once '../entities/dao/ligneDeFraisDAO.php';



$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$id=isset($_SESSION['id']) ? $_SESSION['id'] : '';
$nom=isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
$prenom=isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';


     $Note_de_fraisDAO= new Note_de_fraisDAO;
     $rows=$Note_de_fraisDAO->find($id); 
           
         foreach ($rows as $row) 
              {

                echo('<p><a href="ligne_frais.php?annee='. $row->get_annee() .'" >bordereaux</a>' . $row->get_id_note_de_frais() .'  '.$row->get_annee());
                echo('<br>'); 

              }
