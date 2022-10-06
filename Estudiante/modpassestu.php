<?php
include "../complementos/conexion.php";
session_start();
$con = conexion();
$ideper = $_GET['id2'];
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

      echo '
      <div class="row align-self-center">
      <div class="text-center position-center" style="display: grid; position: absolute; top:36rem;">
      <div class="alert alert-danger" role="alert">
      La contraseña no coincide en los campos, vuelve a intentarlo
      </div>
      </div>
      </div>';
    ?>
 
      <?php
    } else {

      $query_contra = mysqli_query(conexion(), "SELECT persona.pass FROM persona
        WHERE persona.idpersona = '$ideper'");
      $contrasena = mysqli_fetch_array($query_contra);


      if ($_POST['passact'] == $contrasena[0]) {

        if (isset($_POST['btnmodificar2'])) {

          $querymodificarc = mysqli_query(conexion(), "UPDATE persona SET pass='$cpass' WHERE idpersona=$ideper");
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

          echo "<script>window.location= '../Estudiante/visualizar_estu.php' </script>";
        }
      } else {

        echo '
        <div class="row align-self-center">
        <div class="text-center position-center" style="display: grid; position: absolute; top:36rem;">
        <div class="alert alert-warning" role="alert">
        Contraseña incorrecta, vuelve a intentarlo
        </div>
        </div>
        </div>';
        ?>
  
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

  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
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


      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Administrador</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active text-white" href="../Admin/InicioAdmi.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../Admin/UsuariosAdmin.html">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../Admin/misdatos.php">Mis datos</a>
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
          <br><br>
          <div class="modificar">
            <input class="btn btn-success" type="submit" name="btnmodificar2" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
          </div>
      </form>
    </div>
  </div>
  </div>

  <div class="footer">
    <div class="container-fluid bg-dark text-center p-2 text-light">
      <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>
    </div>
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
  $codest2 = $_POST['txtcodest'];
  $semestre2 = $_POST['txtsemes'];


  $querymodificar = mysqli_query(conexion(), "UPDATE persona SET nombre='$nombre2',apellido='$apellido2',tipoide='$tipod2', numdoc='$numdoc2', celular= '$celular2', correo= '$correo2' WHERE idpersona=$ideper");
  $querymodificar_estu = mysqli_query(conexion(), "UPDATE estudiante SET codigoestudiante='$codest2',semestre='$semestre2' WHERE idpersona=$ideper");

  if ($querymodificar_estu) {
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
}
?>