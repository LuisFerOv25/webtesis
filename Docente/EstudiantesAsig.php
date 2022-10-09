<?php

include "../complementos/conexion.php";
$ID_TRABAJOG = $_GET["idTrabajo"];

session_start();
$email = $_SESSION['email'];
$con = conexion();
$con2 = conexion();
$idpersona = isset($_POST['idpersona']);



$query_docente = mysqli_query($con, "SELECT persona.idpersona FROM persona 
JOIN docente ON persona.idpersona = docente.idpersona
    WHERE persona.correo = '$email'");
$result2 = mysqli_fetch_array($query_docente);


$query = mysqli_query($con2, "SELECT 
        persona.nombre as nomEstudiante, 
        persona.apellido as apellEstudiante, 
        persona.tipoide as idllEstudiante, 
        persona.numdoc as docEstudiante, 
        persona.celular as celEstudiante, 
        persona.correo as emailEstudiante, 
        estudiante.codigoestudiante as codEstudiante, 
        estudiante.semestre as semEstudiante FROM trabajogrado 
        JOIN estudiante ON trabajogrado.codigoestudiante = estudiante.codigoestudiante
        JOIN persona ON estudiante.idpersona = persona.idpersona WHERE (trabajogrado.idTrabajoGrado = $ID_TRABAJOG) AND (docasig = $result2[0])");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Información Estudiante</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
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
                <a class="nav-link active" href="./Inicio_Docente.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./perfildocente.php">Mis datos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Docente_usuarios.php">Proyecto de grado</a>
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


  <div class="center_Calificación">
    <div class="card ">
      <h3 class="card-header ">Información del estudiante </h3>
      <table class="table table-bordered">
        <tr>
          <th>Estudiante</th>
          <th>Tipo de documento</th>
          <th>Número de documento</th>
          <th>Celular</th>
          <th>Correo</th>
          <th>Código estudiantil</th>
          <th>Semestre</th>
        </tr>

        <tbody class="table-group-divider">

          <?php
          while ($row = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <th><?php echo $row['nomEstudiante'] ?>
              <?php echo $row['apellEstudiante'] ?>
            </th>
            <th><?php echo $row['idllEstudiante'] ?></th>
            <th><?php echo $row['docEstudiante'] ?></th>
            <th><?php echo $row['celEstudiante'] ?></th>
            <th><?php echo $row['emailEstudiante'] ?></th>
            <th><?php echo $row['codEstudiante'] ?></th>
            <th><?php echo $row['semEstudiante'] ?></th>
          </tr>

          <?php
          }
          ?>
        </tbody>

      </table>

    </div>
  </div>

  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>

</body>

</html>