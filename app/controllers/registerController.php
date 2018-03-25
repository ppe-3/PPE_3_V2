<?php
include_once '../../inc/hashage.php';
include_once '../entities/dao/DemandeurDAO.php';
include_once '../entities/Demandeur.php';

$nom 			= isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom 		= isset($_POST['prenom']) ? $_POST['prenom'] : '';
$rue            = isset($_POST['rue']) ? $_POST['rue'] : '';
$cp 			= isset($_POST['cp']) ? $_POST['cp'] : '';
$ville 			= isset($_POST['ville']) ? $_POST['ville'] : '';
$passe 			= isset($_POST['passe']) ? $_POST['passe'] : '';
$mail           = isset($_POST['mail']) ? $_POST['mail'] : '';
$datenaissance  = isset($_POST['datenaissance']) ? $_POST['datenaissance'] : '';
$sexe           = isset($_POST['sexe']) ? $_POST['sexe'] : '';
$rep            = isset($_POST['rep']) ? $_POST['rep'] : '';
$submit 		= isset($_POST['submit']) ? $_POST['submit'] : '';

if($submit)
{
    if(strlen($cp) > 5 )
    {   
        echo "Code postal incorrect";
    }
    else
    {
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

        $daoDemandeur = new DemandeurDAO();

        if($daoDemandeur->findByMail($mail))
        {
            echo "Utilisateur déjà inscrit.";
        }
        else
        {

            $daoDemandeur->insert_demandeur($array);
            $demandeur = new Demandeur($array);
            $_SESSION['id'] = $daoDemandeur->findByMail($mail);
            $_SESSION['nom_demandeur'] = $demandeur->get_nom_demandeur();
            $_SESSION['prenom_demandeur'] = $demandeur->get_prenom_demandeur();
            $_SESSION['rue_demandeur'] = $demandeur->get_rue_demandeur();
            $_SESSION['cp_demandeur'] = $demandeur->get_cp_demandeur();
            $_SESSION['ville_demandeur'] = $demandeur->get_ville_demandeur();
            $_SESSION['mail_demandeur'] = $demandeur->get_mail_demandeur();
            $_SESSION['datenaissance_demandeur'] = $demandeur->get_datenaissance_demandeur();
            $_SESSION['sexe_demandeur'] = $demandeur->get_sexe_demandeur();
            header('Location: ../../index.php');
        }   
    }


}

