<?php
include "../complementos/conexion.php";
session_start();
$email = $_SESSION['email'];
$con = conexion();
if (!empty($_POST)) {
  $pass = ($_POST['passact']);
  $cpass = ($_POST['passn']);
  $npass = ($_POST['passr']);

  if ($_POST['passn'] == "") {
?>
    <script>
      alert("Campos vacios");
    </script>
    <?php
  } else {

    if ($_POST['passn'] != $_POST['passr']) {

    ?>
      <script>
        alert("La contraseña no coincide en los campos, vuelve a intentarlo");
      </script>
      <?php
    } else {

      $query_contra = mysqli_query(conexion(), "SELECT persona.pass FROM persona
          WHERE persona.correo = '$email'");
      $contrasena = mysqli_fetch_array($query_contra);

      $query_persona = mysqli_query($con, "SELECT persona.idpersona FROM persona
        WHERE persona.correo = '$email'");
      $ideper = mysqli_fetch_array($query_persona);


      if ($_POST['passact'] == $contrasena[0]) {

        if (isset($_POST['btnmodificar2'])) {

          $querymodificarc = mysqli_query(conexion(), "UPDATE persona SET pass='$cpass' WHERE idpersona=$ideper[0]");
          if ($querymodificarc) {
      ?>

            <script>
              alert("Contraseña cambiada exitosamente")
            </script>
          <?php
          } else {
          ?>

            <script>
              alert("Error al actualizar contraseña")
            </script>
        <?php
          }

          echo "<script>window.location= '../Login/login.html' </script>";
        }
      } else {
        ?>
        <script>
          alert("Contraseña incorrecta, vuelve a intentarlo");
        </script>
<?php

      }
    }
  }
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
      <h4 class="card-header text-center">CAMBIAR CONTRASEÑA</h4>
      <form method="POST">
        <div class="card-body orientacion_tarjeta">

          <div class="container text-right">
            <div class="row align-items-start" class="col">


              <div class="sm mb-2 text-center">
                <label for="passact" class="py-1">Contraseña actual</label>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="passact">
              </div>

            </div>


            <div class="row align-items-start">
              <div class="col">
                <div class="sm mb-3 text-center">
                  <label for="passn" class="py-1">Nueva contraseña</label>
                  <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="passn">
                </div>

              </div>
            </div>

            <div class="row align-items-center">


              <div class="col text-center">
                <div class="sm mb-3">
                  <label for="passnr" class="py-1">Repetir nueva contraseña</label>
                  <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="passr">
                </div>

              </div>
            </div>
          </div>
          <div class="modificar">
            <input class="btn btn-success" type="submit" name="btnmodificar2" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">

          </div>
      </form>
    </div>
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

  echo "<script>window.location= '../Login/login.html' </script>";
}
?>