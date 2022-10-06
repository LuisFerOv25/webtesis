<?php
include "../complementos/conexion.php";

$ID_TRABAJOG = $_GET["idTrabajo"];

if (!empty($_POST)) {

  if (empty($_POST['estado_propuesta']) || empty($_POST['txt_retroalimentacion'])) {
    echo "<script> alert('TODOS LOS CAMPOS SON OBLIGATORIOS');window.location= '../Docente/Docente_usuarios.php' </script>";
  } else {
    $ESTPROP = $_POST['estado_propuesta'];
    $RETROPROP = $_POST['txt_retroalimentacion'];


    $insertar_estado = mysqli_query(conexion(), "INSERT INTO estado (estadoTrabajo, comentario, idTrabajoGrado)
			                    VALUES ('$ESTPROP','$RETROPROP', $ID_TRABAJOG)");


    if ($insertar_estado) {
      echo "<script> alert('CALIFICACIÓN EXITOSA'); window.location = '../Docente/Docente_usuarios.php' </script>";
    } else {
      echo "<script> alert('ERROR AL CALIFICAR'); window.location = '../Docente/Docente_usuarios.php' </script>";
    }
  }
}

?>


<!DOCTYPE html>
<html>

<head>

  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Calificar Trabajo</title>
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
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
                <a class="nav-link active" href="../Docente/Inicio_Docente.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Docente/perfildocente.php">Mis datos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Docente/Docente_usuarios.php">Proyecto de grado</a>
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
    <div class="card">
      <h3 class="card-header">Calificación Trabajo de grado</h3>
      <div class="card-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Estado de la propuesta</label>

            <div class="mb-3">

              <select name="estado_propuesta" class="form-select">

                <option value="0" style="display:none"><label>Seleccionar estado</label></option>
                <option value="Aprobado">Aprobado</option>
                <option value="No aprobado">No aprobado</option>
              </select>

            </div>

          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Retroalimentación</label>
            <textarea name="txt_retroalimentacion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
      </div>


      <div class="center_Boton_Calificacion">

        <input class="btn btn-success" type="submit" value="Enviar">
        <br>
      </div>

    </div>

  </div>

  </form>

  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>


</body>

</html>