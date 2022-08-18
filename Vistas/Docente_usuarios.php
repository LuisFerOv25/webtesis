<?php 


include "../complementos/conexion.php";

    session_start();
    $email = $_SESSION['email'];
    $con=conexion();
    $con2=conexion();
    $idpersona = isset($_POST['idpersona'] );
    

    $query_docente = mysqli_query($con,"SELECT persona.idpersona FROM persona JOIN docente ON persona.idpersona = docente.idpersona
    WHERE persona.correo = '$email'");
    $result2 = mysqli_fetch_array($query_docente);
 

    $query= mysqli_query($con2,"SELECT trabajogrado.nombre as trabajogrado ,persona.nombre as estudiante, 
        trabajogrado.rutaArchivo as archivo FROM trabajogrado JOIN estudiante ON trabajogrado.codigoestudiante=estudiante.codigoestudiante JOIN persona
         ON estudiante.idpersona=persona.idpersona WHERE docasig = $result2[0]");
    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row align-items-center"> 

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Nombre del proyecto</th>
                                        <th>Nombre del estudiante</th>
                                        <th>Archivo</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['trabajogrado']?></th>
                                                <th><?php  echo $row['estudiante']?></th>
                                                <th><?php  echo $row['archivo']?></th>
                                                <th></th>
                                                <th>
                                                    <div class="center_Boton_Calificacion">
                                                      <a href="Calificar_Trabajo.html">
                                                        <button type="button" class="btn btn-danger" href>Evaluar</button>
                                                    </a>
                                                  </div>

                                                  </th>
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                                
                            </table>

                        </div>
                    </div>  
            </div>
            
    </body>
</html>