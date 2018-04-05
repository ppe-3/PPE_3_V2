<?php
include_once 'src/init.php';
include_once ROOT.'/app/controllers/ligneDeFraisController.php';
include_once ROOT.'/app/templates/menu.php';
?>
 <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">Liste des ligne de frais </h1>
          <hr>
          	 <center>   
                <table>
        <tr>
            <th>Date</th>
            <th>Trajet</th>
            <th>distance</th>
            <th>Cout des peages</th>
            <th>Cout du repas</th>
            <th>Cout du hebergement</th>
            <th>Total</th>
        </tr>

        <?php $total = $tarif * $row->get_km_lf() 
                 + $row->get_coutpeage_lf() 
                 + $row->get_coutrepas_lf() 
                 + $row->get_couthebergement_lf(); ?>

                  
                  <?php  foreach ($rows as $row) { ?>
					<?php  echo('<tr>
            <td>'. $row->get_datetrajet_lf() .'</td>
            <td>'.$row->get_trajet_lf(). '</td>
            <td>' . $row->get_km_lf() .'</td>
            <td>'.$row->get_coutpeage_lf().'</td>
            <td>'.$row->get_coutrepas_lf().'</td>
            <td>'.$row->get_couthebergement_lf().'</td>
            <td>'.$total.'</td>
            <td><a href="modifierControlleurs.php?id='.$row->get_id_lf().'">Modifier</a></td>
            <td><a href="suprimerControlleurs.php?id='.$row->get_id_lf().'">Supprimer</a></td>
              </tr>'); } ?>
				</table>
	
        </div>
      </div>
    </header>
    </html>