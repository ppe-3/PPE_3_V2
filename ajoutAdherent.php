<?php
include_once 'src/init.php';
include_once ROOT.'/app/controllers/ajoutAdherentController.php';
include_once ROOT.'/app/templates/menu.php';
?>

<!DOCTYPE html>
<html>

<header class="masthead">
  <div class="header-content">
    <div class="header-content-inner">
    <hr>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <center>
          <h1>Ajouter un adhérent mineur</h1>
            Numéro licence<br /><input type="text" required name="numlicense_adherent"/><br />
            Nom <br /><input type="text" required name="nom_ad"/><br />
            Prenom <br /><input type="text" required name="prenom_ad"/><br />

            Date naissance <br /><input type="date" required name="date_naissance_ad"/><br />
            <input type="submit" name="submit" value="Ajouter"><br />
            <input type="reset" value="Annuler"><br />
        </center>
      </form>  



    </div>
  </div>
</header> 
</html>