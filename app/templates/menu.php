<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Projet fredi</title>

  <!-- Bootstrap core CSS -->
  <link href="inc/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="inc/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='inc/assets/css/styles.css' rel='stylesheet' type='text/css'>
  <!--
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
   Plugin CSS -->
  <link href="inc/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="inc/assets/css/creative.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
<?php if(isset($_SESSION['id'])): ?>
        <a class="navbar-brand js-scroll-trigger" href="index.php" >Bienvenue sur FREDI - <?= @$_SESSION['nom_demandeur']; ?></a>
<?php endif; ?>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
<?php if(!isset($_SESSION['id'])): ?>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Connexion</a></li>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="register.php">Inscription</a></li>
<?php endif; ?>
<?php if(isset($_SESSION['id'])): ?>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="listeBordereaux.php">Note de frais</a></li>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="demandeuredit.php">Mon compte</a></li>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Déconnexion</a>
    </li>
<?php endif; ?>
<?php if(isset($_SESSION['id'])) :?>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="adherents.php">Espace adherents</a></li>
<?php endif; ?>

          </ul>
        </div>
      </div>
    </nav>
</body>
</html>