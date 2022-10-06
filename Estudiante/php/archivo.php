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
  include "../../complementos/conexion.php";


  session_start();
  $email = $_SESSION['email'];

  if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['fecha'])) {

  ?>
      <script>
        alert('Todos los campos son obligatorios');
        window.location = '../RegistroTrabajoGrado.html'
      </script>";
      <?php
    } else {

      $nombre = $_POST["nombre"];
      $fecha = $_POST["fecha"];
      $rutaTesis = "";
      $tamanio = 8000;

      if (isset($_FILES['tesis']) && $_FILES['tesis']['type'] == 'application/pdf') {

        if ($_FILES['tesis']['size'] < ($tamanio * 1024)) {

          $rutaTesis = "../archivoTesis/" . $_FILES['tesis']['name'];
          if (empty($rutaTesis)) {
      ?>
            <script>
              alert('Todos los campos son obligatorios');
              window.location = '../RegistroTrabajoGrado.html'
            </script>";
            <?php
          } else {
            move_uploaded_file($_FILES['tesis']['tmp_name'], '../archivoTesis/' . $_FILES['tesis']['name']);
            echo
            '
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                    La tesis se ha guardado correctamente.
                            <a href="../InicioEstu.php">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </a>
                                    </div>
                            
                            ';
            $query_val_cod = mysqli_query(conexion(), "SELECT persona.idpersona FROM persona JOIN estudiante 
                        ON estudiante.idpersona= persona.idpersona WHERE  persona.correo = '$email'");
            $result = mysqli_fetch_array($query_val_cod);

            $query_val_cod2 = mysqli_query(conexion(), "SELECT estudiante.codigoestudiante FROM estudiante JOIN persona 
                        ON estudiante.idpersona= persona.idpersona WHERE  persona.idpersona = $result[0]");
            $result2 = mysqli_fetch_array($query_val_cod2);

            $SQL = "INSERT INTO webtesis.trabajogrado(nombre, fechacar, rutaArchivo, codigoestudiante,numedit) VALUES ('$nombre', '$fecha','$rutaTesis','$result2[0]',1)";
            $resultado = conexion()->query($SQL);
            if (!$resultado) {
              echo "Error al realizar consulta:" . $conexion->error;
            }
            if ($SQL) {

            ?>
              <script>
                alert("Trabajo de grado registrado correctamente")
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
  }
  ?>


</body>

</html>