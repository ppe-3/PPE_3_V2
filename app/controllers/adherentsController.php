<?php
include_once ROOT.'/app/entities/dao/AdherentDAO.php';
$id =	isset($_SESSION['id']) ? $_SESSION['id'] : '';


$daoAdherents = new AdherentDAO();
$daoAdherents->findByDemandeur($id);

echo ('<table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Mineur</th>
        </tr>');

foreach ($daoAdherents as $adherent) 
{

    echo('<tr>
            <td>'. $adherent->get_nom_adherent() .'</td>
            <td>'.$adherent->get_prenom_adherent(). '</td>
            <td>' . $adherent->get_date_naissance_adherent() .'</td>
            <td>'.$adherent->get_mineur().'</td>
        </tr>');
    echo('<br/>'); 
echo '</table>';
}