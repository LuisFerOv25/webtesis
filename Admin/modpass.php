<?php
include "../complementos/conexion.php";
session_start();
$email = $_SESSION['email'];
$con = conexion();
$ideper = $_GET['id2'];

  if (!empty($_POST)) {
    $pass = ($_POST['passact']);
    $cpass = ($_POST['passn']);
    $npass = ($_POST['passr']);


   if ($_POST['passn'] == "" ) {

      ?>
        <script>
          alert("Campos vacios");
        </script>
        <?php
    }else{
        if ($_POST['passn'] != $_POST['passr']) {

        ?>
          <script>
            alert("La contraseña no coincide en los campos, vuelve a intentarlo");
          </script>
          <?php
        } else {

            $query_contra = mysqli_query(conexion(), "SELECT persona.pass FROM persona
            WHERE persona.idpersona = '$ideper'");
          $contrasena = mysqli_fetch_array($query_contra);

        
          if($_POST['passact'] == $contrasena[0]){

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

              echo "<script>window.location= '../Login/login.html' </script>";
            }

          }else{
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
        <div style="text-align: center;">
          <a class="navbar-brand ">Administrador</a>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Administrador</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" href="InicioAdmi.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="UsuariosAdmin.html">Usuarios</a>
              </li>
              <li class="nav-item">
               <a class="nav-link text-white" href="misdatos.php">Mis datos</a>
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
        <div class="card-body " style="padding: 13px 265px 180px 300px;">
            
              <div class="container text-right">
                  <div class="row align-items-start" <div class="col">


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


  <!--   <div class="final_pag">

    <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>

  </div> -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>



