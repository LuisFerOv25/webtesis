
<?php
include "../complementos/conexion.php";
session_start();
$email = $_SESSION['email'];
$con = conexion();

$iddoc = mysqli_query($con, "SELECT persona.idpersona FROM persona
    WHERE persona.correo = '$email'");
$IdeDoc = mysqli_fetch_array($iddoc);

$query_doc = mysqli_query($con, "SELECT * FROM persona JOIN docente ON persona.idpersona=docente.idpersona WHERE docente.idpersona=$IdeDoc[0]");
while ($mostrar = mysqli_fetch_array($query_doc)) {
  $nombre = $mostrar['nombre'];
  $apellido = $mostrar['apellido'];
}

?>
<!DOCTYPE html>
<html>

<head>

  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Inicio Docente</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
    crossorigin="anonymous"></script>
  <script src='main.js'></script>

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
            Sesión Docente
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../index.html">Cerrar sesión</a></li>
          </ul>
        </div>


        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Docente</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
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


  <div class="inicio_doc">

    <div class="text-center">
      <div class="shake-slow">
        <img src="../img/usuario.png" class="img_usr" alt="img perfil docente">
      </div>
    </div>
    <br>
    <div class="card">
      <h3 class="card-header text-center">Bienvenido/a <?php echo "$nombre"; ?> <?php echo "$apellido"; ?></h3>
      <div class="card-body">
        <h5 class="card-title">Información</h5>
        <p class="card-text">Usted ha ingresado exitosamente al apartado de Docente,
          en este módulo podrá observar los respectivos datos de los trabajo de grado de los estudiantes,  como el nombre del proyecto,el archivo, tiempo restante para calificarlo etc.
          así mismo observará los estudiantes aprobados, como también si lo desea puede modificar sus datos personales.</p>
      </div>
    </div>
  </div>


  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>


</body>

</html>