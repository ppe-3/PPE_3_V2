<?php
include_once '../../src/init.php';
include_once ROOT.'/app/controllers/ligneDeFraisController.php';
include_once ROOT.'/app/templates/menu.php';
?>
<header class="masthead">
  <div class="header-content">
    <div class="header-content-inner">
    <hr>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <center>
          <h1>Ajouter une ligne de frais</h1>
            <p>Date trajet<br /><input type="date" required name="datetrajet"  />
            <p>
              <select name="motif">
                <option value="1" selected>Voyage</option>
                <option value="2" >Retard</option>
              </select>
            </p>
            Trajet <br /><input type="text" required name="trajet" placeholder="Exemple :Toulouse-Pamiers"  /><br />
            Km Parcourus <br /><input type="text" required name="km"/><br />
            Cout trajet <br /><input type="text" required name="ct"  /><br />
            Cout péage <br /><input type="text" required name="cp"/><br />
            Cout repas <br /><input type="text" required name="cr"/><br />
            Cout hébergement <br /><input type="text" required name="ch"/><br />
            <input type="submit" name="submit" value="Ajouter"><br />
            <input type="reset" value="Annuler"><br />
        </center>
      </form>  
    </div>
  </div>
</header>
 