<?php
include "../complementos/conexion.php";
$con = conexion();
$idTr = $_GET['idt'];
$idTrab = $idTr;
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
                <a class="nav-link active text-white" href="../Estudiante/InicioEstu.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../RegistroTrabajoGrado.html">Registro Trabajo de grado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../Estudiante/php/TrabajoRegistrado.php">Trabajo registrado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../Estudiante/misdatosest.php">Mis datos</a>
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
      <form action="modcarga.php?idtra=<?php echo $idTrab?>" method="post" enctype="multipart/form-data">
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
                <span class="input-group-text" id="inputGroup-sizing-sm">Ruta del archivo actual</span>
                <input type="text" class="form-control" aria-label="Sizing example input" disabled
                  aria-describedby="inputGroup-sizing-sm" name="txttipod" value="<?php echo $carga;?>" required>

                
              </div>
              <input class="form-control form-control-sm mb-3" type="file" name="tesis" id="tesis">
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

    
    $SQL = mysqli_query(conexion(), "UPDATE trabajogrado SET nombre='$nombre2',fechacar='$fechac2' WHERE idTrabajoGrado=$idTr");
 
if($SQL){
  ?>
  <script>
  alert("Datos modificados");
</script>
<?php

}else{
  ?>
  <script>
  alert("Datos NO modificados");
</script>
<?php
}
echo "<script>window.location= '../Estudiante/php/TrabajoRegistrado.php' </script>";
}

    

?>