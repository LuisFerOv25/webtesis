<?php


include "../../complementos/conexion.php";

session_start();
$email = $_SESSION['email'];
$con = conexion();
$con2 = conexion();
$idpersona = isset($_POST['idpersona']);


$query_estudiante = mysqli_query($con, "SELECT persona.idpersona FROM persona JOIN estudiante ON persona.idpersona = estudiante.idpersona
    WHERE persona.correo = '$email'");
$result = mysqli_fetch_array($query_estudiante);

$query_cod_estudiante = mysqli_query($con, "SELECT estudiante.codigoestudiante FROM estudiante JOIN persona ON estudiante.idpersona= persona.idpersona
    WHERE estudiante.idpersona = $result[0]");
$result2 = mysqli_fetch_array($query_cod_estudiante);

$query = mysqli_query($con2, "SELECT trabajogrado.idTrabajoGrado as idtr,trabajogrado.nombre as trabajogrado,trabajogrado.docasig as docentea ,persona.nombre as estudiante, 
        trabajogrado.rutaArchivo as archivo FROM trabajogrado JOIN estudiante ON trabajogrado.codigoestudiante=estudiante.codigoestudiante JOIN persona
         ON estudiante.idpersona=persona.idpersona WHERE trabajogrado.codigoestudiante = $result2[0]");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estudiante</title>
  <link rel="icon" type="image/x-icon" href="../../img/icon.png">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="./img/fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <style>
    body {
      background-image: url(../../img/font.png);
      background-size: cover;
    }
  </style>
</head>

<body>


  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="btn-group">
        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Sesión Estudiante
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../../index.html">Cerrar sesión</a></li>
        </ul>
      </div>

      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Estudiante</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active text-white" href="../InicioEstu.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../RegistroTrabajoGrado.html">Registro Trabajo de grado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../php/TrabajoRegistrado.php">Trabajo registrado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../../Estudiante/misdatosest.php">Mis datos</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="inicio_adm">
    <div class="card">
      <h3 class="card-header text-center">REGISTRO TRABAJO DE GRADO</h3>
      <div class="card-body">


        <div class="row d-flex justify-content-center">

          <table class="table table-bordered">
            <thead class="">
              <tr>
                <th>Nombre del proyecto</th>
                <th>Archivo</th>
                <th>Jurado asignado</th>
                <th>Tiempo restante para calificarlo</th>
                <th>Estado</th>
                <th>Editar</th>
              </tr>
            </thead>

            <tbody>
              <?php
              while ($row = mysqli_fetch_array($query)) {
                $idT = $row['idtr'];
                $docasign = $row['docentea'];
              ?>
                <tr>
                  <th><?php echo $row['trabajogrado'] ?></th>
                  <th><?php echo $row['archivo'] ?></th>

                  <?php
                  if (!empty($docasign)) {
                    $query_docentea = mysqli_query(conexion(), "SELECT persona.nombre as nom,persona.apellido as ape FROM persona JOIN docente ON persona.idpersona = docente.idpersona WHERE persona.idpersona = $docasign");
                    while ($row = mysqli_fetch_array($query_docentea)) {
                  ?>
                      <th><?php echo $row['nom'], " ", $row['ape'] ?></th>
                    <?php
                    }
                  } else {
                    ?>
                    <th><?php echo "No asignado" ?></th>
                  <?php
                  }
                  ?>

                  <th>
                    <a href="../visualizar_tiemest.php">
                      <button type="button" class="btn btn-warning" href>Ver tiempo</button>
                    </a>
                  </th>


                  <th>
                    <?php


                    $estado_apr = mysqli_query(conexion(), "SELECT trabajogrado.nombre as trabajogrado, 
                  persona.nombre as estudiante_nom,
                  persona.apellido as estudiante_ape,
                  estado.estadoTrabajo as estado_trabajo FROM trabajogrado 
                  JOIN estudiante ON trabajogrado.codigoestudiante = estudiante.codigoestudiante 
                  JOIN estado ON trabajogrado.idTrabajoGrado = estado.idTrabajoGrado
                  JOIN persona ON estudiante.idpersona = persona.idpersona 
                  WHERE persona.idpersona = $result[0]");


                    $row_res = mysqli_fetch_array($estado_apr)
                    ?>

                    <?php echo $row_res['estado_trabajo'] ?>

                    <?php
                    ?>
                  </th>




                  <th>
                    <div class=" center_Boton_Calificacion">
                      <a href="../../Trabajo grado/modificar_trab.php?idt=<?php echo $idT ?>">
                        <button type="button" class="btn btn-success" href>Entrar</button>
                      </a>
                    </div>

                  </th>
                </tr>
              <?php
              }
              ?>
            </tbody>

          </table>
          <div class="text-center">
            <h4>ASESOR ASIGNADO</h4>
          </div>

          <?php

          $sql = 'SELECT * FROM persona INNER JOIN docente ON persona.idpersona=docente.idpersona
              INNER JOIN roldocente ON docente.idroldoc= roldocente.idroldoc
              WHERE roldocente.idroldoc = 2';
          $query = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_array($query)) {
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
          ?>

          <?php
          }

          ?>
        </div>
        <div class="text-center">
          <?php echo $nombre ?>
        </div>

      </div>

    </div>

  </div>
  </div>
  <br>
  </div>



  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>
</body>


</html>