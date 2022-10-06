<?php

include '../complementos/conexion.php';
$con = conexion();
$id = $_GET['id'];
$eliminar = "DELETE persona FROM persona where idpersona='$id'";
echo ("jdjbdcbdc $id" );
$resultado=mysqli_query($con, $eliminar);

header("location:eliminarEs.php");

?>