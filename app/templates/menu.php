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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="inc/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="inc/assets/css/creative.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger">Bienvenue <?= $_SESSION['nom_demandeur']; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
<?php if(!isset($_SESSION['id'])): ?>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="app/templates/login.php">Connexion</a></li>
    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="app/templates/register.php">Inscription</a></li>
<?php endif; ?>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="listeBordereaux.php">Note de frais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Mon compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= (BASEURL.'app/controllers/logout.php'); ?>">Déconnexion</a>
          </li>
          </ul>
        </div>
      </div>
    </nav>
</body>
</html>