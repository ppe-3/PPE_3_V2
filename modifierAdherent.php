<?php

//Page modifier adherent

include_once 'src/init.php';
include_once ROOT.'/app/controllers/modifierAdherentController.php';
//include_once ROOT.'/app/templates/menu.php';
$id=$_GET["id"];
?>
<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Modifier les informations de l'adhérent </h1>
      <hr>
      <center>   
       
       <form method="post" action="modifierAdherent.php?id=<?php echo $id ?>">

         <input type="hidden" name="numlicense_adherent" value="<?php echo $id ?>" />

            <p>Le numéro de license de l'adhérent n'est pas modifiable<p>
            Nom <br /><input type="text" required name="nom_ad" value="<?php echo $adherent->get_nom_ad(); ?>" /><br />
            Prénom <br /><input type="text" required name="prenom_ad" value="<?php echo $adherent->get_prenom_ad(); ?>" /><br />
            Date de naissance <br /><input type="date" required name="date_naissance_ad"  value="<?php echo $adherent->get_date_naissance_ad(); ?>" /><br />

            <input type="submit" name="submit" value="Modifier"><br />
            <input type="reset" value="Annuler"><br />

        </form>
      </center>
      </div>
    </div>
  </header>
</html>