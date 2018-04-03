<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
include_once ROOT.'/app/controllers/registerController.php';
?>
<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Inscription </h1>
      <hr>
          
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
      <center>
        <p>
          <u>Nom</u> <br /><input type="text" required name="nom"  /><br />
          
          <u>Prénom</u> <br /><input type="text" required name="prenom"  /><br />
          
          <u>Représentant légal</u> ?   <br />    <input type="radio" name="repre_demandeur" value="1" checked/> Oui<br />
                                                  <input type="radio" name="repre_demandeur" value="0" > Non<br />
          
          <u>Rue</u> <br /><input type="text" required name="rue"  /><br />
         
          <u>Code Postal</u> <br /><input type="text" required name="cp"  /><br />
          
          <u>Ville</u> <br /><input type="text" required name="ville"  /><br />
          
          <u>Adresse mail</u> <br /><input type="email" required name="mail" /><br />
          
          <u>Date de naissance</u> <br /><input type="date" required name="datenaissance"/><br />          
          
          <u>Sexe</u>            <br />    <input type="radio" name="sexe" value="H" > Homme<br />
                                     <input type="radio" name="sexe" value="F" checked/> Femme<br />
          
          <u>Mot de passe</u> <br /><input type="password" required name="passe"/><br />
          
          <input type="submit" name="submit" value="S'inscrire"><br />
        </p>
      </center>
        </form>  
      </div>
    </div>
  </header>
</html>