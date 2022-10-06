<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tiempo Restante</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">

  <!-- Poppins fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style type="text/css" src="style.css"></style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <style type="text/css">
    body {
      font-family: 'Poppins', sans-serif;
      background-image: url(../img/font.png);
      background-size: cover;
    }

    #counter {
      width: 410px;
      background: #ff190b;
      box-shadow: 0px 2px 9px 0px black;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src='main.js'></script>
</head>

<body>

  <div class="col-3">

    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="btn-group">
          <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Sesión Docente
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../index.html">Cerrar sesión</a></li>
          </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Docente</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" href="Inicio_Docente.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="perfildocente.php">Mis datos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Docente_usuarios.php">Proyecto de grado</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../EstadoAprobacionEst.php">Estado de aprobación estudiantes</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

  </div>

  <div class="container mt-5 py-5">
    <div class="row">
      <div class="col-md-12 mt-40">
        <div class="card" style="height: 400px;">
          <div class="card-header text-white text-center bg-success">
            <h2>Tiempo restante para calificar el trabajo de grado es:</h2>
          </div>
          <div class="card-body pt-5">
            <h1 id="counter" class="text-center mt-5 m-auto p-3 text-white"></h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    <?php
    $fecha = date('Y-m-d');
    $nuevaFecha = date("Y-m-d", strtotime('+5 day', strtotime($fecha)));
    ?>
    var countDownDate = new Date("<?php echo "$nuevaFecha"; ?>").getTime();

    var x = setInterval(function() { //Funcion para actualizar el tiempo cada segundo
      var now = new Date().getTime();
      var distancia = countDownDate - now;
      var dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
      var horas = Math.floor((distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
      var segundos = Math.floor((distancia % (1000 * 60)) / 1000);

      document.getElementById("counter").innerHTML = dias + "Dias : " + horas + "H " +
        minutos + "M " + segundos + "S ";

      if (distancia < 0) {
        clearInterval(x);
        document.getElementById("counter").innerHTML = "Tiempo agotado";
      }
    }, 1000);
  </script>

  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>

</body>

</html>