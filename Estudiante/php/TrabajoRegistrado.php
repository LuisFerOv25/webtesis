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

$query = mysqli_query($con2, "SELECT trabajogrado.idTrabajoGrado as idtr,trabajogrado.nombre as trabajogrado ,persona.nombre as estudiante, 
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
      <div style="text-align: center;">
        <a class="navbar-brand text-white">Estudiante</a>
      </div>
      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Estudiante</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active text-white" href="InicioEstu.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="RegistroTrabajoGrado.html">Registro Trabajo de grado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="php/TrabajoRegistrado.php">Trabajo registrado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../../Estudiante/misdatosest.php">Mis datos</a>
              </li>
            </ul>
          </div>
      </div>
    </div>
  </nav>

  <div class="container ">
    <div class="row ">
      <div class="col col-md-10 text-center">

        <h2 class=" my-5 py-5">TRABAJO DE GRADO REGISTRADO</h2>
      </div>
      <div class="col col-md-10 text-center">



        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <table class="table">
              <thead class="table-info table-striped">
                <tr>
                  <th>Nombre del proyecto</th>
                  <th>Archivo</th>
                  <th>Editar</th>
                  <th></th>
                  <th></th>

                </tr>
              </thead>

              <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                  $idT = $row['idtr'];
                ?>
                  <tr>
                    <th><?php echo $row['trabajogrado'] ?></th>
                    <th><?php echo $row['archivo'] ?></th>
                    <th>
                      <div class="center_Boton_Calificacion">
                        <a href="../../Trabajo grado/modificar_trab.php?idt=<?php echo $row['idtr'] ?>">
                          <button type="button" class="btn btn-warning" href>Entrar</button>
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
        </div>
      </div>
    </div>
    <br>
  </div>



  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>