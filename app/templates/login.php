<?php
include_once 'menu.php';
include_once '../controllers/loginController.php';
?>

<header class="masthead">
  <div class="header-content">
    <div class="header-content-inner">
      <h1 id="homeHeading">Connexion </h1>
      <hr>
        <h3>Entrez vos coordonnées pour vous connecter</h3>
        <h3>Cela vous permettra d'accéder à bordereaux et vos notes de frais </h3>  
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form" method="post">
        <p>Email :<br /><input type ="mail" required name="mail" value=""/></p>
        <p>Mot de passe :<br /><input type ="password" required  name="passe" value=""/></p>
        <p><input type="submit" name="submit" value="Se connecter" /></p>
    </form>
    </div>
  </div>
</header>
    

