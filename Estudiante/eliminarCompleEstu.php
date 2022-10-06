<?php

include '../complementos/conexion.php';

$id = $_GET['id'];
$eliminar = "DELETE persona FROM persona join rol  Where persona.idpersona ='$id'";
echo ("jdjbdcbdc $id" );
$resultado=mysqli_query($eliminar);

header("location:eliminarAdmi.php");

?>