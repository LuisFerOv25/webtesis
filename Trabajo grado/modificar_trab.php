<?php
include"../complementos/conexion.php";
$con = conexion();
$idTr = $_GET['idt'];

$querybuscar = mysqli_query($con, "SELECT * FROM trabajogrado WHERE idTrabajoGrado = $idTr");
while($mostrar = mysqli_fetch_array($querybuscar))
{
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
    crossorigin="anonymous"></script>

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
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
          aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div style="text-align: center;">
          <a class="navbar-brand ">Administrador</a>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Administrador</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
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


  <div class="inicio_adm">
    <div class="card">
      <h3 class="card-header text-center">MODIFICAR TRABAJO DE GRADO</h3>
      <div class="card-body">
        <form action="modcarga.php" method="POST" enctype="multipart/form-data">
        <div class="container text-right">
          <div class="row align-items-start">
            <div class="col">


              <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm" name="txtnombre" value="<?php echo $nombre;?>" required>
              </div>

            </div>
            <div class="col">

              <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de carga </span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm" name="txtfecha" value="<?php echo $fecha;?>" required>
              </div>

            </div>
          </div>

          <div class="row align-items-start">
            <div class="col">
              <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Tipo de documento</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm" name="txttipod" value="<?php echo $carga;?>" required>

                
              </div>
              <input class="form-control form-control-sm mb-3" type="file" name="txttesis" id="tesis">
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
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
</body>

</html>
<?php
	
	if(isset($_POST['btnmodificar']))
{    
  $nombre2 = $_POST['txtnombre'];
  $fechac2 = $_POST['txtfecha'];
  $tesis2 = $_POST['txttesis'];
  $rutaTesis = "";
  $tamanio = 8000;

  if (isset($_FILES['tesis']) && $_FILES['tesis']['type'] == 'application/pdf') {

    if ($_FILES['tesis']['size'] < ($tamanio * 1024)) {

      $rutaTesis = "../Estudiante/archivoTesis/" . $_FILES['tesis']['name'];
      if (empty($rutaTesis)) {
  ?>
        <script>
          alert('Todos los campos son obligatorios');
          window.location = '../modificar_trab.php'
        </script>";
        <?php
      } else {
        move_uploaded_file($_FILES['tesis']['tmp_name'], '../archivoTesis/' . $_FILES['tesis']['name']);
        echo
        '
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                La tesis se ha guardado correctamente.
                        <a href="../InicioEstu.html">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </a>
                                </div>
                        
                        ';

    
    $SQL = mysqli_query(conexion(), "UPDATE trabajogrado SET nombre='$nombre2',fechacar='$fechac2 WHERE idTrabajoGrado=$idTr");
 

    $resultado = conexion()->query($SQL);
    if (!$resultado) {
      echo "Error al realizar consulta:" . $conexion->error;
    }
    if ($SQL) {

    ?>
      <script>
        alert("Trabajo de grado Modificado correctamente")
      </script>
    <?php
    } else {

    ?>
      <script>
        alert("Error al registrar trabajo de grado")
      </script>
<?php
    }
  }
} else {
  echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al subir el documento peso superior al permitido !.
                    <a href="../subirTrabajodeGrado.html">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </a>
                    </div>
                
                ';
}
} else if (isset($_FILES['tesis']) && $_FILES['tesis']['type'] != 'application/pdf') {
echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Archivo no seleccionado o solo se admiten documentos PDF
            <a href="../RegistroTrabajoGrado.html">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </a>
                </div>
            
            ';
}
}

    

?>