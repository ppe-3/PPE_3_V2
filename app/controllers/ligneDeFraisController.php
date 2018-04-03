<?php
include_once 'src/init.php';
include ROOT.'/inc/connexion_bd.inc.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/entities/dao/ligneDeFraisDAO.php';

$id =               isset($_SESSION['id']) ? $_SESSION['id'] : '';
$nom =              isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
$prenom =           isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';

$annee =            isset($_GET['annee']) ? $_GET['annee'] : '';
$id_demandeur =     isset($_GET['user']) ? $_GET['user'] : '';

$ligneDeFraisDAO= new LignefraisDAO;
$tarif = $ligneDeFraisDAO->findtarif($annee);

$rows = $ligneDeFraisDAO->findby($id_demandeur,$annee); 

echo ('<table>
        <tr>
            <th>Date</th>
            <th>Trajet</th>
            <th>distance</th>
            <th>Cout des peages</th>
            <th>Cout du repas</th>
            <th>Cout du hebergement</th>
            <th>Total</th>
        </tr>');
foreach ($rows as $row) 
{
    $total = $tarif * $row->get_km_lf() + $row->get_coutpeage_lf() + $row->get_coutrepas_lf() + 
             $row->get_couthebergement_lf();

    echo('<tr>
            <td>'. $row->get_datetrajet_lf() .'</td>
            <td>'.$row->get_trajet_lf(). '</td>
            <td>' . $row->get_km_lf() .'</td>
            <td>'.$row->get_coutpeage_lf().'</td>
            <td>'.$row->get_coutrepas_lf().'</td>
            <td>'.$row->get_couthebergement_lf().'</td>
            <td>'.$total.'</td>
        </tr>');
    echo('<br/>'); 
echo '</table>';
}

