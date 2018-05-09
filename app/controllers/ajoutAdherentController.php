<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/AdherentDAO.php';



//a modifier les nom des champs.
$id_demandeur =$_SESSION['id'];

$numlicense_adherent   = isset($_POST['numlicense_adherent']) ? $_POST['numlicense_adherent'] : '';
$nom_ad     = isset($_POST['nom_ad']) ? $_POST['nom_ad'] : '';
$prenom_ad             = isset($_POST['prenom_ad']) ? $_POST['prenom_ad'] : '';
$date_naissance_ad       = isset($_POST['date_naissance_ad']) ? $_POST['date_naissance_ad'] : '';
$mineur       = 1;
$submit     = isset($_POST['submit']) ? $_POST['submit'] : '';


if($submit){



              $adherentDAO= new AdherentDAO;
              $adherentDAO->insert_adherent($numlicense_adherent,$id_demandeur,$nom_ad,$prenom_ad,$date_naissance_ad,$mineur);

      header('Location:adherents.php?user='.$id_demandeur);
}