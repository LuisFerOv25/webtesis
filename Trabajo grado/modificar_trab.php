<?php
include "../complementos/conexion.php";
$con = conexion();
$idTr = $_GET['idt'];
$idTrab = $idTr;
$querybuscar = mysqli_query($con, "SELECT * FROM trabajogrado WHERE idTrabajoGrado = $idTr");
while ($mostrar = mysqli_fetch_array($querybuscar)) {
  $nombre = $mostrar['nombre'];
  $fecha = $mostrar['fechacar'];
  $carga = $mostrar['rutaArchivo'];
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
          Sesión Estudiante
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../index.html">Cerrar sesión</a></li>
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
              <a class="nav-link active text-white" href="../Estudiante/InicioEstu.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../Estudiante/php/TrabajoRegistrado.php">Registro Trabajo de grado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../Estudiante/RegistroTrabajoGrado.html">Trabajo registrado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../Estudiante/misdatosest.php">Mis datos</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <div class="inicio_adm">
    <div class="card">
      <h3 class="card-header text-center">MODIFICAR TRABAJO DE GRADO</h3>
      <div class="card-body">
        <form action="modcarga.php?idtra=<?php echo $idTrab ?>" method="post" enctype="multipart/form-data">
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
                  <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de carga </span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtfecha" value="<?php echo $fecha; ?>" required>
                </div>

              </div>
            </div>

            <div class="row align-items-start">
              <div class="col">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Ruta del archivo actual</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" disabled aria-describedby="inputGroup-sizing-sm" name="txttipod" value="<?php echo $carga; ?>" required>


                </div>
                <input class="form-control form-control-sm mb-3" type="file" name="tesis" id="tesis">
              </div>
            </div>
          </div>


          <div class="modificar">

            <input class="btn btn-success" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">

            <a class="btn btn-success" href="../Estudiante/php/TrabajoRegistrado.php" role="button">Atrás</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="footer">
    <br><br><br><br><br><br>
    <div class="container-fluid bg-dark text-center p-2 text-light">
      <p>2022 © Webtesis UDENAR | Pasto, Nariño - Colombia</p>
    </div>
  </div>

</body>

</html>