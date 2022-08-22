<?php

include "../complementos/conexion.php";
$con = conexion();
$con2 = conexion();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Modificar Trabajo Grado</title>
  <link rel="stylesheet" href="../css/style.css">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
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


  <div class="container text-center">
    <div class="row">

      <div class="col ">
        <nav class="navbar navbar-dark bg-dark fixed-top">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div style="text-align: center;">

              <a class="navbar-brand ">Trabajo de grado</a>
            </div>
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Administrador</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Admin/InicioAdmi.html">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Admin/InicioAdmi.html">Usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Admin/DatosAdm.html">Mis datos</a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>

  </div>

  <div class="centrar_envio">
    <div class="card">
      <h3 class="card-header">Editar/Enviar trabajo de grado</h3>
      <div class="card-body">

        <form action="" method="post">
          <div class="row align-items-start px-5 mx-5">

            <div class="col-6">
              <label>Nombre del trabajo</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">📜</span>
                <input type="text" class="form-control" placeholder="Modificar" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>

            <div class="col-6">
              <form action="" method="POST">
                <label for="tipodoc">Asignar jurado</label>
                <select name="tipodoc" id="tipodoc" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                  <option>Selecciona un jurado</option>
                  <?php


                  $sql = 'SELECT * FROM persona INNER JOIN docente ON persona.idpersona=docente.idpersona
              INNER JOIN roldocente ON docente.idroldoc= roldocente.idroldoc
              WHERE roldocente.idroldoc = 1';
                  $query = mysqli_query($con, $sql);
                  while ($row = mysqli_fetch_array($query)) {
                    $idpersona = $row['idpersona'];
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                  ?>
                    <option value="<?php echo $idpersona ?>"> <?php echo $nombre ?> <?php echo $apellido ?></option>

                  <?php
                  }


                  ?>
                </select>

                <div class="col p-3">
                  <input type="submit" value="Enviar" name="submit" class="btn btn-outline-success">
                </div>

              </form>

              <?php
              $id = $_GET['id'];

              if (isset($_POST["tipodoc"])) {
                $tipodoc = $_POST["tipodoc"];

                $sql2 = "UPDATE trabajogrado SET docasig = $tipodoc WHERE idTrabajoGrado = $id ";
                $query2 = mysqli_query($con2, $sql2);
              }
              ?>

            </div>



          </div>
      </div>

    </div>
  </div>
  </form>



  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>