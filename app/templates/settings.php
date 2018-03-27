<?php
include_once '../../src/init.php';
include_once ROOT.'/app/controllers/settingsController.php';
?>
<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Mon compte </h1>
      <hr>
      <center>   

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
      
        <p>
          <u>Nom</u> <br /><input type="text" disabled value="<?php echo $_SESSION['nom_demandeur']; ?>"  /><br />
          
          <u>Prénom</u> <br /><input type="text" disabled value="<?php echo $_SESSION['prenom_demandeur']; ?>"  /><br />
                              
          <u>Rue</u> <br /><input type="text" disabled  value="<?php echo $_SESSION['rue_demandeur']; ?>"  /><br />
         
          <u>Code Postal</u> <br /><input type="text" disabled value="<?php echo $_SESSION['prenom_demandeur']; ?>"  /><br />
          
          <u>Ville</u> <br /><input type="text" disabled value="<?php echo $_SESSION['cp_demandeur']; ?>"   /><br />
          
          <u>Adresse mail</u> <br /><input type="email" disabled disabled value="<?php echo $_SESSION['mail_demandeur']; ?>"  /><br />
          
          <u>Date de naissance</u> <br /><input type="date" disabled value="<?php echo $_SESSION['datenaissance_demandeur']; ?>"  /><br />    
          
          <u>Ancien mot de passe</u> <br /><input type="password" value="" name="old_password"  /><br />
        
          <u>Nouveau mot de passe</u> <br /><input type="password" value="" name="new_password"  /><br />
          <u>Confirmer nouveau mot de passe</u> <br /><input type="password" value="" name="new_password_2"  /><br />
          <input type="submit" name="submit" value="Modifier"><br />

        </p>
      
        </form>
      </center>
      </div>
    </div>
  </header>
</html>