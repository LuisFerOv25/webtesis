<?php
include "../complementos/conexion.php";
session_start();
$email = $_SESSION['email'];
$con = conexion();

$query_admin = mysqli_query($con, "SELECT persona.idpersona FROM persona
    WHERE persona.correo = '$email'");
$result = mysqli_fetch_array($query_admin);

$querybuscar = mysqli_query($con, "SELECT * FROM persona JOIN docente ON persona.idpersona=docente.idpersona WHERE docente.idpersona=$result[0]");
while ($mostrar = mysqli_fetch_array($querybuscar)) {
  $nombre = $mostrar['nombre'];
  $apellido = $mostrar['apellido'];
  $tipod = $mostrar['tipoide'];
  $numdoc = $mostrar['numdoc'];
  $celular = $mostrar['celular'];
  $correo = $mostrar['correo'];
  $idrol = $mostrar['idrol'];
  $especialidad = $mostrar['especialidad'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis datos Admin</title>
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="img/">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

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


  <div class="inicio_adm">
    <div class="card">
      <h3 class="card-header text-center">MIS DATOS PERSONALES</h3>
      <div class="card-body">
        <form method="POST">

          <div class="container text-right">
            <div class="row align-items-start">
              <div class="col">


                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtnombre" value="<?php echo $nombre; ?>" required>
                </div>

              </div>
              <div class="col">

                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Apellido</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtapellido" value="<?php echo $apellido; ?>" required>
                </div>

              </div>
            </div>

            <div class="row align-items-start">
              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Tipo de documento</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txttipod" value="<?php echo $tipod; ?>" required>
                </div>

              </div>
              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Número</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtnumdoc" value="<?php echo $numdoc; ?>" required>
                </div>

              </div>
            </div>

            <div class="row align-items-start">


              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Celular</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtcel" value="<?php echo $celular; ?>" required>
                </div>

              </div>
              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtcorreo" value="<?php echo $correo; ?>" required>
                </div>

              </div>
            </div>
            <div class="row align-items-start">

              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Rol</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtrol" value="<?php
                                                                                                                                                          if ($idrol == 1) {
                                                                                                                                                            echo ("Jurado");
                                                                                                                                                          } else if ($idrol == 2) {
                                                                                                                                                            echo ("Asesor");
                                                                                                                                                          }
                                                                                                                                                          ?>" required>
                </div>

              </div>
              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Especialidad</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtespe" value="<?php echo $especialidad; ?>" required>
                </div>

              </div>
            </div>
          </div>

          <div class="modificar">
            <input class="btn btn-success" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
            <a class="btn btn-success" href="Inicio_Docente.html" role="button">Atrás</a>
          </div>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-center py-5">
      <a href="modpassdoc.php">
        <button type="button" class="btn btn-warning">Modificar contraseña</button>
      </a>
    </div>
  </div>

  <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div>

</body>

</html>
<?php

if (isset($_POST['btnmodificar'])) {
  $nombre2 = $_POST['txtnombre'];
  $apellido2 = $_POST['txtapellido'];
  $tipod2 = $_POST['txttipod'];
  $numdoc2 = $_POST['txtnumdoc'];
  $celular2 = $_POST['txtcel'];
  $correo2 = $_POST['txtcorreo'];
  $rol2 = $_POST['txtrol'];
  $especialidad2 = $_POST['txtespe'];
  if ($rol2 == 'Asesor' || $rol2 == 'asesor') {
    $rolasig = 2;
  } else if ($rol2 == 'Jurado' || $rol2 == 'jurado') {
    $rolasig = 1;
  }

  $querymodificar = mysqli_query(conexion(), "UPDATE persona SET nombre='$nombre2',apellido='$apellido2',tipoide='$tipod2', numdoc='$numdoc2', celular= '$celular2', correo= '$correo2' WHERE idpersona=$result[0]");
  $querymodificar_doc = mysqli_query(conexion(), "UPDATE docente SET especialidad='$especialidad2',idroldoc='$rolasig' WHERE idpersona=$result[0]");
  if ($querymodificar_doc) {
?>

    <script>
      alert("Datos modificados exitosamente")
    </script>
  <?php
  } else {
  ?>

    <script>
      alert("Error al modificar los datos")
    </script>
<?php
  }

  echo "<script>window.location= '../Docente/perfildocente.php' </script>";
}
?>