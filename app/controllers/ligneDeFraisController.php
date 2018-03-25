<?php
include_once '../../src/init.php';
include ROOT.'/inc/connexion_bd.inc.php';
include_once ROOT.'/app/templates/menu.php';

$id=isset($_SESSION['id']) ? $_SESSION['id'] : '';
$nom=isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
$prenom=isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';



$datetrajet = isset($_POST['datetrajet']) ? $_POST['datetrajet'] : '';
$motif = isset($_POST['motif']) ? $_POST['motif'] : '';
$trajet = isset($_POST['trajet']) ? $_POST['trajet'] : '';
$km = isset($_POST['km']) ? $_POST['km'] : '';
$ct = isset($_POST['ct']) ? $_POST['ct'] : ''; //ct : Cout trajet
$cp = isset($_POST['cp']) ? $_POST['cp'] : ''; //cp : Cout péage
$cr = isset($_POST['cr']) ? $_POST['cr'] : ''; //cr : Cout repas
$ch = isset($_POST['ch']) ? $_POST['ch'] : ''; //ch : Cout hébergement
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
 
// Modifier avec les champs postés
if($submit){
  $array = array("nom_demandeur" => $nom,
                "prenom_demandeur" => $prenom,
                "rue_demandeur" => $rue,
                "cp_demandeur" => $cp,
                "ville_demandeur" => $ville,
                "motdepasse_demandeur" => hashage($passe),
                "mail_demandeur" => $mail,
                "datenaissance_demandeur" => $datenaissance,
                "sexe_demandeur" => $sexe,
                "repre_demandeur" => $rep);
$curYear = date('Y');   
$ligneDeFraisDao = new ligneDeFraisDao();
$ligneDeFraisDao->insert_ligne_de_frais($array);
echo "Insertion effectuée";
}

?>