<?php
include 'includes/conectar.php';
  

// recuperar datos

$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$web = $_POST['web'];
$tv = $_POST['tv'];
$redes = $_POST['redes'];
$amigo = $_POST['amigo'];


// guardando votacion
$sql = "INSERT INTO votos (nombre, alias, rut, email, region, comuna, candidato, web, tv, redes, amigo) VALUES ('".$nombre."', '".$alias."', '".$rut."', '".$email."', ".$region.", ".$comuna.", ".$candidato.", ".$web.", ".$tv.", ".$redes.", ".$amigo.")";
if (mysqli_query($coneccion, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($coneccion);
}


include 'includes/desconectar.php';
?>