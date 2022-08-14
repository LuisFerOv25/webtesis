
<?php

include "../complementos/conexion.php";

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Enviar Trabajo de Grado</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
    crossorigin="anonymous"></script>
  <script src='main.js'></script>
</head>

<body>
  <?php


$id=$_GET['id'];


  $con3=conexion();
  $con=conexion();

?>
<div class="container-fluid">
  <div class="row align-items-center">
    <div class="col align-items-center">
      <form action="" method="POST" >

              <label for="tipodoc">Seleccione un jurado</label>
              <select name="tipodoc" id="tipodoc" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
            <option>Selecciona un jurado</option>
              <?php

             
                $sql2 = 'SELECT * FROM docente INNER JOIN persona ON docente.idpersona=persona.idpersona
                  INNER JOIN roldocente ON docente.idroldoc= roldocente.idroldoc
                  WHERE roldocente.idroldoc = 1';
                  $query2= mysqli_query($con,$sql2);
                  while($row2=mysqli_fetch_array($query2)){
                    $iddocente= $row2['iddocente'];
                    $nombre= $row2['nombre'];
                    $apellido= $row2['apellido'];
                    ?>
                    <option value="<?php echo $iddocente ?>"> <?php echo $nombre ?> <?php echo $apellido ?></option>
                      
         
                    <?php
                  }

              ?>
              </select>

        
        </div>

        <div class="col p-3">
          <input type="submit" value="Enviar" name="submit" class="btn btn-outline-success">
        </div>
    </form>
  </div>
</div>
<?php

  if(isset($_POST["tipodoc"])){$tipodoc=$_POST["tipodoc"];

  $sql3= "UPDATE docente SET idtrabajoasig = $id WHERE iddocente = $tipodoc ";
  $query3= mysqli_query($con3,$sql3);
  if($query3){
    header('refresh:0:url=index.php?error');
  }
}
?>


       
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

</body>

</html>