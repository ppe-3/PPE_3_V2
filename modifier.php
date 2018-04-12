<?php

include_once 'src/init.php';
include_once ROOT.'/app/controllers/ModifierLigneDeFraisControlleur.php';
include_once ROOT.'/app/templates/menu.php';
$id=$_GET["id"];
?>
<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Modifier votre ligne de frais </h1>
      <hr>
      <center>   

    <form method="post" action="modifier.php?id=<?php echo $id ?>">

         <input type="hidden" name="idLigne" value="<?php echo $id ?>" />

            <p>Date trajet<br /><input type="date" required name="datetrajet" value="<?php echo $ligne->get_datetrajet_lf(); ?>"  /></p>

            Trajet <br /><input type="text" required name="trajet" value="<?php echo $ligne->get_trajet_lf(); ?>" /><br />
            Km Parcourus <br /><input type="text" required name="km" value="<?php echo $ligne->get_km_lf(); ?>" /><br />
            Cout péage <br /><input type="text" required name="cp" value="<?php echo $ligne->get_coutpeage_lf(); ?>"  /><br />
            Cout repas <br /><input type="text" required name="cr"  value="<?php echo $ligne->get_coutrepas_lf(); ?>" /><br />
            Cout hébergement <br /><input type="text" required name="ch" value="<?php echo $ligne->get_couthebergement_lf(); ?>"/><br />
            <input type="submit" name="submit" value="Modifier"><br />
            <input type="reset" value="Annuler"><br />

        </form>
      </center>
      </div>
    </div>
  </header>
</html>