<?php

// consultas para carga inicial de formulario

// consulta regiones
$resultado_regiones = mysqli_query($coneccion, "SELECT * FROM regiones");

// consulta regiones
$resultado_candidatos = mysqli_query($coneccion, "SELECT * FROM candidatos");

?>