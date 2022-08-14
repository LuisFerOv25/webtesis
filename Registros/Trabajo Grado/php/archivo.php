<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="./img/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    
    <?php
                include "../complementos/conexion.php";
                
                $nombre = $_POST["nombre"];
                $fecha = $_POST["fecha"];
                $codigo = $_POST["codigo"];
                $rutaTesis= "";
                $tamanio = 8000 ;

                if(isset($_FILES['tesis']) && $_FILES['tesis']['type'] == 'application/pdf'){

                    if( $_FILES['tesis']['size'] < ($tamanio * 1024) ){
                        move_uploaded_file( $_FILES['tesis']['tmp_name'], '../archivoTesis/' . $_FILES['tesis']['name']);
                        echo
                        '
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                La tesis se ha guardado correctamente.
                        <a href="../estadoTrabajo.html">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </a>
                                </div>
                        
                        ';
                        $rutaTesis ="../archivoTesis/".$_FILES['tesis']['name'];

                        $SQL="INSERT INTO webtesis.trabajogrado(nombre, fechacar, rutaArchivo, codigoestudiante) VALUES ('$nombre', '$fecha','$rutaTesis','$codigo')";
                        
                        $resultado=$conexion->query($SQL);
                        if(!$resultado){
                            echo "Error al realizar consulta:".$conexion->error;                
                        }

                    }else{
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al subir el documento peso superior al permitido !.
                            <a href="../subirTrabajodeGrado.html">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </a>
                            </div>
                        
                        ';
                    }

                }else if(isset($_FILES['tesis']) && $_FILES['tesis']['type'] != 'application/pdf'){
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Solo se admiten documentos PDF
                    <a href="../subirTrabajodeGrado.html">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </a>
                        </div>
                    
                    ';
                }
            
        ?>

    
</body>
</html>