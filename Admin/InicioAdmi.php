<?php
include "../complementos/conexion.php";
session_start();
$email = $_SESSION['email'];
$con = conexion();

$query_admin = mysqli_query($con, "SELECT * FROM persona
    WHERE persona.correo = '$email'");

while ($mostrar = mysqli_fetch_array($query_admin)) {
  $nombre = $mostrar['nombre'];
  $apellido = $mostrar['apellido'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Administrador</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <style>
    body {
      background-image: url(../img/font.png);
      background-size: cover;
    }
  </style>


</head>

<body>

  <div class="col-3">

    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
          aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="btn-group">
          <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Sesión Administrador
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../index.html">Cerrar sesión</a></li>
          </ul>
        </div>


        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Administrador</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active text-white" href="InicioAdmi.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="UsuariosAdmin.html">Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="misdatos.php">Mis datos</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

  </div>


  <div class="inicio_adm">
  <div class="shake-slow">
    <div class="text-center">
      <img src="../img/usuario.png" class="img_usr" alt="img perfil docente">
    </div>
  </div>
    <br>

    <div class="card">
    <h3 class="card-header text-center">Bienvenid@ <?php echo "$nombre"; ?> <?php echo "$apellido"; ?></h3>
      <div class="card-body">
        <h5 class="card-title">Información</h5>
        <p class="card-text">Usted ha ingresado exitosamente al apartado del administrador,
          en este modulo posee control total para la gestión de usuarios tales como docentes, estudiantes
          y administradores, asi como la gestión del trabajo de grado registrado por el estudiante.</p>
      </div>
    </div>
  </div>


  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>
</body>

</html>