<?php
include('../database.php');

$

$query_repetir = "SELECT * FROM usuario WHERE descripcion='$descripcion'";
$result_repetir =  mysqli_query($conexion,$query_repetir);
?>