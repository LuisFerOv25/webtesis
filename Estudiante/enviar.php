<?php
require_once("PHPMailer/conficorreo.php");

$mailSend = new clsMail();

$bodyHTML = '
        <h2>Saludos, se ha creado su cuenta de manera satisfactoria, contactese con el administrador
        para obtener sus credenciales de acceso.</h2>
        Contacto: LuzidaliaSan45@gmail.com
        <br>
        <br>
        <br>
        Saludos.';
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
                                <a class="nav-link active text-white" href="../Admin/InicioAdmi.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="../Admin/UsuariosAdmin.html">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="../Admin/misdatos.php">Mis datos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </div>
    <div class="container text-center py-5 my-5">
    <h3 class="text-center ">Notificacion de credenciales via correo electronico</h3>
        <form action="" method="POST">
            <div class="row align-items-center py-5 mx-5">
                <div class="col">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Direccion de correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Ingrese un correo gmail valido.</div>
                    </div>
                </div>
            </div>
           
                    <input class="btn btn-success" type="submit" value="Enviar">
                    <a class="btn btn-success" href="../Admin/UsuariosAdmin.html" role="button">Atrás</a>
        
    </div>
<div class="text-center">

</div>
    </form>
    <?php
    if (!empty($_POST)) {
        $correo = $_POST['correo'];
        $enviado =  $mailSend->metEnviar("Webtesismail", "Email", $correo, "Credencial de acceso a Webtesis", $bodyHTML);

        if ($enviado) {
            echo ('<div class="text-center px-5">
            <div class="alert alert-primary" role="alert">
            Correo enviado exitosamente
          </div>
          </div>');
        } else {
            echo ('<div class="text-center px-5">
            <div class="alert alert-danger" role="alert">
            Ups, ha ocurrido un error al enviar el correo
          </div>
          </div>');
        }
    }
    ?>