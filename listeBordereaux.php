<?php
include_once 'src/init.php';
include_once ROOT.'/app/controllers/bordereauController.php';
include_once ROOT.'/app/templates/menu.php';

?>
<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Liste des notes de frais  </h1>
      <hr>
      <center>   
                 

                  <?php  foreach ($rows as $row) { ?>

					<?php  
					echo('<a href="ligneDeFrais.php?annee='. $row->get_annee() .'&user='.$row->get_id_demandeur(). '">bordereaux</a>' . $row->get_id_note_de_frais() .'  '.$row->get_annee() . ''); 
							if ($row->get_annee() == date("Y")){
											$etat=1;
					                  			 }
				           } 
				           ?>


					<?php if (empty($rows)){ ?>
					<?php echo ("<p>Vous n'avez aucun borderaux ."); } ?>

 



    </div>
  </div>
</header>