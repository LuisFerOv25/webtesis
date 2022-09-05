<?php


include "../complementos/conexion.php";

session_start();
$email = $_SESSION['email'];
$con = conexion();
$con2 = conexion();
$idpersona = isset($_POST['idpersona']);


$query_docente = mysqli_query($con, "SELECT persona.idpersona FROM persona JOIN docente ON persona.idpersona = docente.idpersona
    WHERE persona.correo = '$email'");
$result2 = mysqli_fetch_array($query_docente);


$query = mysqli_query($con2, "SELECT trabajogrado.nombre as trabajogrado ,persona.nombre as estudiante, 
        trabajogrado.rutaArchivo as archivo FROM trabajogrado JOIN estudiante ON trabajogrado.codigoestudiante=estudiante.codigoestudiante JOIN persona
         ON estudiante.idpersona=persona.idpersona WHERE docasig = $result2[0]");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Calificar Trabajo</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

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
        <div style="text-align: center;">
          <a class="navbar-brand ">Docente</a>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Docente</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" href="Inicio_Docente.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="perfildocente.php">Mis datos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Docente_usuarios.php">Proyecto de grado</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>


  <div class="center_Calificación">
    <div class="card">

      <h3 class="card-header">Datos del Trabajo de grado</h3>
      <div class="card-body">
      </div>


      <div class="row mx-5">

        <table class="table table-bordered">

          <tr>
            <th>Nombre del proyecto</th>
            <th>Nombre del estudiante</th>
            <th>Archivo</th>
            <th>Evalución</th>
          </tr>

          <tbody class="table-group-divider">

            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <th><?php echo $row['trabajogrado'] ?></th>
                <th><?php echo $row['estudiante'] ?></th>
                <th><?php echo $row['archivo'] ?></th>
                <th>
                  <div class="center_Boton_Calificacion">
                    <a href="../Trabajo grado/Calificar_Trabajo.html">
                      <button type="button" class="btn btn-success" href>Evaluar</button>
                    </a>
                  </div>

                </th>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>
      </div>


      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link">Anterior</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
          </li>
        </ul>
      </nav>

      <br>

    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>

</body>

</html>