<!--PHP CODING-->
<?php

  
  include "../complementos/conexion.php";
  
    session_start();
    $email = $_POST['email'];
    $PASSWORD = $_POST['password'];
    $ROL = $_POST['rol'];
    
    $consulta = "SELECT * FROM persona WHERE correo  = '$email' AND pass = '$PASSWORD' AND idrol = '$ROL'";
    
    $resultado = mysqli_query(conexion(), $consulta);
    $filas = mysqli_num_rows($resultado);

    if ($filas) {
  

       if($ROL=="1")
          {	$_SESSION["email"] = $email;
            header("Location: ./../Vistas/UsuariosAdmin.html");
            
          }
        else if ($ROL=="2")
          {
            $_SESSION["email"] = $email;
            header("Location: ./../Vistas/Docente_usuarios.php");
          }
        else if ($ROL=="3")
          {
            $_SESSION["email"] = $email;
            header("Location: pag_principal.php");
          }

    }else {
      //echo '<script>alert("Contraseña o Usuario incorrectos")</script>';  
      echo "<script> alert('ERROR DE AUTENTICACIÓN');window.location= 'login.html' </script>";


    }

    mysqli_free_result($resultado);
    mysqli_close(conexion());
?>