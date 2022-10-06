<?php

include '../complementos/conexion.php';
$con = conexion();
$id = $_GET['id'];
$eliminar = "DELETE persona FROM persona join rol on persona.idrol = rol.idrol where idpersona='$id'";
echo ("jdjbdcbdc $id" );
$resultado=mysqli_query($con, $eliminar);

header("location:eliminarAdmi.php");

?>