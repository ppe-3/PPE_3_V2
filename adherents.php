<?php
include_once 'src/init.php';
include_once ROOT.'/app/controllers/adherentController.php';
include_once ROOT.'/app/templates/menu.php';

?>

<!DOCTYPE html>
<html>


 <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">Liste des adhérents</h1>    
          <hr>
          <center> 


<?php
echo ('<table border="2">
        <tr>
            <th>Numéro de license de l adhérent</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Mineur</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>');

foreach ($Adherents as $adherent) 
{
    echo('<tr>
            <td>'.$adherent->get_numlicense_adherent().'</td>
            <td>'.$adherent->get_nom_ad().'</td>
            <td>'.$adherent->get_prenom_ad(). '</td>
            <td>' .$adherent->get_date_naissance_ad().'</td>   
            <td>'.$adherent->get_mineur().'</td>

            <td><a href="modifierAdherent.php?id='.$adherent->get_numlicense_adherent().'"><img src="/ico/pencil.png" alt="img"></a></td>
			<td><a href="supprimerAdherent.php?id='.$adherent->get_numlicense_adherent().'"><img src="/ico/delete.png" alt="img"></a></td>

        </tr>');
}
echo '</table>';

?>
		</center>

          <p><a href="ajoutAdherent.php"><img src="/ico/add.png" alt="img">Ajouter un adherent</a></p>
        </div>

      </div>

    </header>

          

</html>

