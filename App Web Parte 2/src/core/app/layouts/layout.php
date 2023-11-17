<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>.: Bankoint - Evilnapsis :.</title>
    <link href="assets/bootstrap-5/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
    <script src="res/js/jquery.min.js"></script>
  </head>

  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="./"><b>BANKOINT</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">INICIO</a>
        </li>

                <?php if(isset($_SESSION["client_id"])):?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MI CUENTA
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./?view=home">Inicio</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./?action=access&opt=logout">Salir</a></li>
          </ul>
        </li>
      <?php else: ?>
                <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./?view=login">ACCEDER</a>
        </li>
      <?php endif; ?>

    </div>
  </div>
</nav>




<?php 
  View::load("index");
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<hr>
<p class="text-muted text-center">Powered by <a href="http://evilnapsis.com/" target="_blank">Evilnapsis</a> &copy; 2022</p>
</div>
</div>
</div>

<script src="assets/bootstrap-5/js/bootstrap.min.js"></script>
  </body>
</html>
