<?php

include "../complementos/conexion.php";
if (!empty($_POST)) {
  if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['tipoide']) || empty($_POST['numdoc']) || empty($_POST['sexo']) || empty($_POST['celular']) || empty($_POST['correo']) || empty($_POST['pass']) || !isset($_POST['terminos'])) {
?>
    <script>
      alert("Todos los campos son obligatorios")
    </script>
    <?php
  } else {


    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoide = $_POST['tipoide'];
    $numdoc = $_POST['numdoc'];
    $sexo = $_POST['sexo'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $pass = ($_POST['pass']);

    if ($_POST['pass'] != $_POST['confpass']) {

    ?>
      <script>
        alert("La contraseña no coincide")
      </script>
      <?php
    } else {

      if ($_POST['correo'] != $_POST['confcorreo']) {

      ?>
        <script>
          alert("El correo no coincide")
        </script>
        <?php
      } else {

        $query = mysqli_query(conexion(), "SELECT correo FROM persona where correo = '$correo'");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
        ?>
          <script>
            alert("Correo o usuario ya existe")
          </script>
          <?php
        } else {



          $query_insert_persona = mysqli_query(conexion(), "INSERT INTO persona(nombre,apellido,tipoide,numdoc,celular,correo,pass,sexo,idrol)
							VALUES ('$nombre','$apellido','$tipoide','$numdoc','$celular','$correo','$pass','$sexo',1)");


          if ($query_insert_persona) {

          ?>
            <script>
              alert("Usuario creado correctamente")
            </script>
          <?php
          } else {

          ?>
            <script>
              alert("Error al crear usuario")
            </script>
<?php
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Administradores</title>
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <link rel="stylesheet" href="../css/style.css">
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src='main.js'></script>
  <script src='validacion.js'></script>

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
                <a class="nav-link active text-white" href="InicioAdmi.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="UsuariosAdmin.html">Usuarios</a>
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

  <div class="form_registro">
    <hr><br><br>
    <div class="container px-4">

      <h3 align="center">REGISTRO DE ADMINISTRADORES</h3>
      <div class="row">
        <div class="col py-5">
          <div class="mx-5 bg-light " style="border-radius: 2%; ">
            <form action="" method="post">
              <div class="row mb-3 needs-validation" novalidate>
                <div class="col mx-5 px-5">
                  <label for="validationnombre" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-auto">
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="validationnombre">
                  </div>
                </div>
                <div class="col mx-5 px-5">
                  <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                  <div class="col-sm-auto">
                    <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="validationape">
                    <br>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col mx-5 px-5">
                  <label for="tipoide" class="form-label">Tipo de documento:</label>
                  <select class="form-select" aria-label="Default select example" id="tipoide" name="tipoide">
                    <option selected>seleccióne</option>
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="CE">CE</option>
                    <option value="NIP">NIP</option>
                    <option value="NIT">NIT</option>
                    <option value="PAP">PAP</option>

                  </select>
                </div>

                <div class="col mx-5 px-5">
                  <label for="numdoc" class="form-label">Número:</label>
                  <input type="numer" class="form-control" placeholder="Número de identificación" aria-label="inputtipoIDA" id="numdoc" name="numdoc">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col mx-5 px-5">
                  <fieldset class="row mb-3 ">

                    <label for="sexo" class="form-label">Sexo</label>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M">
                        <label class="form-check-label" for="sexo">
                          Masculino
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F">
                        <label class="form-check-label" for="sexo">
                          Femenino
                        </label>
                      </div>

                    </div>
                  </fieldset>
                </div>
                <div class="col mx-5 px-5">
                  <div class="row mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <div class="col-sm-auto">
                      <input type="tel" class="form-control" id="celular" name="celular">
                      <br>
                    </div>
                  </div>
                </div>

              </div>


              <div class="row">
                <div class="col mx-5 px-5">
                  <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                  <input type="email" class="form-control" id="correo" name="correo" aria-describedby="validationcorreo">
                  <div id="validationcorreo" class="invalid-feedback">
                    Proporcióne correo válido

                  </div>
                </div>
                <div class="col mx-5 px-5">
                  <label for="confcorreo" class=" col col-form-label">Confirmar Correo</label>
                  <div class="col-sm-auto">
                    <input type="email" class="form-control" id="confcorreo" name="confcorreo">
                  </div>

                </div>
              </div>


              <div class="row">
                <div class="col mx-5 px-5">
                  <label for="pass" class=" col-sm-2 col-form-label">Contraseña:</label>
                  <div class="col-sm-auto">
                    <input type="password" class="form-control" id="pass" name="pass">
                  </div>
                </div>
                <div class="col mx-5 px-5">
                  <label for="confpass" class=" col col-form-label"> Confirmar Contraseña
                  </label>
                  <div class="col-sm-auto">
                    <input type="password" class="form-control" id="confpass" name="confpass">
                  </div>
                </div>
              </div>

              <div class="container fluid">
                <br>
                <div class="mx-auto" style="width:300px;">
                  <p style="color:black;padding-left:20px;"> <input style="opacity:1;" type="checkbox" data-required="1" name="terminos"> Aceptar los <a style="color:blue;" href="#">Términos y Condiciones</a>

                  </p>
                </div>


                <div class="mx-auto" style="width:190px;">
                  <input class="btn btn-success" type="submit" value="Registrarme">
                  <button type="button" class="btn btn-secondary">Volver</button>
                </div>
              </div>
              <br>
            </form>
          </div>
        </div>
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