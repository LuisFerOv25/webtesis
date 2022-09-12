<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estudiante</title>
  <link rel="icon" type="image/x-icon" href="../../img/icon.png">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="./img/fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>

  <?php
  include ".././complementos/conexion.php";



  $idarch = $_GET['idtra'];
  $contmod = 0;
  if (!empty($_POST)) {

  ?>
    <?php

    $nombre2 = $_POST['txtnombre'];
    $fechac2 = $_POST['txtfecha'];

    $rutaTesis = "";
    $tamanio = 8000;

    if (isset($_FILES['tesis']) && $_FILES['tesis']['type'] == 'application/pdf') {

      if ($_FILES['tesis']['size'] < ($tamanio * 1024)) {

        $rutaTesis = "../Estudiante/archivoTesis/" . $_FILES['tesis']['name'];
        if (empty($rutaTesis)) {
    ?>
          <script>
            alert('Todos los campos son obligatorios ');
          </script>";
          <?php
        } else {
          move_uploaded_file($_FILES['tesis']['tmp_name'], '../Estudiante/archivoTesis/' . $_FILES['tesis']['name']);

          $conmod = mysqli_query(conexion(), "SELECT numedit FROM trabajogrado WHERE idTrabajoGrado = $idarch");
          $resultmod = mysqli_fetch_array($conmod);
          echo ($resultmod[0]);
          if ($resultmod[0] > 2) {
          ?>
            <script>
              alert("Ya no puede modificar mas el proyecto");
            </script>
            <script>
              window.location = '../Estudiante/php/TrabajoRegistrado.php'
            </script>
            <?php
          } else {

            $SQL = "UPDATE webtesis.trabajogrado SET nombre='$nombre2',fechacar='$fechac2', rutaArchivo='$rutaTesis' WHERE idTrabajoGrado = $idarch";

            $resultado = conexion()->query($SQL);
            if (!$resultado) {
              echo "Error al realizar consulta:" . $conexion->error;
            }
            if ($SQL) {

              $SQL2 = "UPDATE webtesis.trabajogrado SET numedit=numedit+1 WHERE idTrabajoGrado = $idarch";
              $resultado2 = conexion()->query($SQL2);

            ?>
              <script>
                alert("Trabajo de grado modificado correctamente");
              </script>
              <script>
                window.location = '../Estudiante/php/TrabajoRegistrado.php'
              </script>
            <?php

            } else {

            ?>
              <script>
                alert("Error al modificar trabajo de grado");
              </script>
  <?php
            }
          }
        }
      } else {
        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al subir el documento peso superior al permitido !.
                            <a href="../Estudiante/php/TrabajoRegistrado.php">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </a>
                            </div>
                        
                        ';
      }
    } else if (isset($_FILES['tesis']) && $_FILES['tesis']['type'] != 'application/pdf') {
      echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Archivo no seleccionado o solo se admiten documentos PDF
                    <a href="../Estudiante/php/TrabajoRegistrado.php">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </a>
                        </div>
                    
                    ';
    }
  }
  ?>


</body>

</html>