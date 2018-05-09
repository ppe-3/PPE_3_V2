<?php
include_once 'src/init.php';
include_once ROOT.'/app/templates/menu.php';
?>

<header class="masthead">
  <div class="header-content">
    <div class="header-content-inner">
      <h1 id="homeHeading">Bienvenue <?= @$_SESSION['nom_demandeur'] ; ?> </h1>
      <hr>
      <p>FREDI - SITE DE GESTION DE VOS NOTES DE FRAIS</p>

    </div>
  </div>
</header>

</body>

</html>
