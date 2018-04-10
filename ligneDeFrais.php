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
      	<?php  if(isset($row)){ ?>
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

		        <?php  foreach ($rows as $row) { ?>
								<?php  
 							   $total = $tarif * $row->get_km_lf() 
			                 + $row->get_coutpeage_lf() 
			                 + $row->get_coutrepas_lf() 
			                 + $row->get_couthebergement_lf(); 

								echo('<tr>
			            <td>'. $row->get_datetrajet_lf() .'</td>
			            <td>'.$row->get_trajet_lf(). '</td>
			            <td>' . $row->get_km_lf() .'</td>
			            <td>'.$row->get_coutpeage_lf().'</td>
			            <td>'.$row->get_coutrepas_lf().'</td>
			            <td>'.$row->get_couthebergement_lf().'</td>
			            <td>'.$total.'</td>');
                             
                        if($annee == date("Y")){
                        echo('
			            <td><a href="modifier.php?id='.$row->get_id_lf().'">Modifier</a></td>
			            <td><a href="suprimer.php?id='.$row->get_id_lf().'">Supprimer</a></td>


			              </tr>');}
		               }
		               }
		               else{
		               	echo('<p>Ce bordereau ne possède actuellement aucun ligne de frais </p> </br>');
		               }
		               if($annee == date("Y")){
		                        echo('</br> <p>Clicker sur  <a href="ajout.php?id='.$_SESSION['id'].'&annee='.$annee. '">ajouter</a> pour insérer une ligne de frais ');
		                }          			
                       else{
                        echo('</br> <p> Ce bordereau ne peut plus etre modifier , vous ne pouvez modifier que les ligne de frais du bordereau actuel. </p> ');


                       }
         ?>
				      </table>
	
        </div>
      </div>
    </header>
    </html>