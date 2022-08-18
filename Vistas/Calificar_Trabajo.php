<?php

   
include "../complementos/conexion.php";


        $ESTPROP = $_POST['estado_propuesta'];
        $RETROPROP = $_POST['txt_retroalimentacion'];



	if(!empty($_POST)){
     

  if(empty($_POST['estado_propuesta']) ||empty($_POST['txt_retroalimentacion'])) {
     echo "<script> alert('TODOS LOS CAMPOS SON OBLIGATORIOS');window.location= 'Calificar_Trabajo.html' </script>";
        
      }else{


            session_start();
            $email = $_SESSION['email'];
            $idpersona = isset($_POST['idpersona'] );
            

            $query_docente = mysqli_query(conexion(),"SELECT persona.idpersona FROM persona JOIN docente ON persona.idpersona = docente.idpersona
            WHERE persona.correo = '$email'");
            $res = mysqli_fetch_array($query_docente);
        

            $Consulta_Id= mysqli_query(conexion(),"SELECT trabajogrado.nombre as trabajogrado ,persona.nombre as estudiante, 
                trabajogrado.rutaArchivo as archivo, trabajogrado.idTrabajoGrado as id_TrabajoG FROM trabajogrado JOIN estudiante ON trabajogrado.codigoestudiante=estudiante.codigoestudiante JOIN persona
                ON estudiante.idpersona=persona.idpersona WHERE docasig = $res[0]");

              while($id_trabajo_grado = mysqli_fetch_array($Consulta_Id)){
              
                          $insertar_estado = mysqli_query (conexion(), "INSERT INTO estado (estadoTrabajo, comentario, idTrabajoGrado)
			                    VALUES ('$ESTPROP','$RETROPROP',  $id_trabajo_grado[id_TrabajoG])");
              }
				
        		if($insertar_estado){
              echo "<script> alert('CALIFICACIÓN EXITOSA');window.location= 'Calificar_Trabajo.html' </script>";						
            }else{
							echo "<script> alert('ERROR AL CALIFICAR');window.location= 'Calificar_Trabajo.html' </script>";
							}
      }
   }
  
?>