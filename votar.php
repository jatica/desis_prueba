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

// buscar votacion con el mismo rut

$resultado_vot = mysqli_query($coneccion, "SELECT * FROM votos WHERE rut LIKE '".$rut."'");
var_dump($resultado_vot);

if ($resultado_vot->num_rows != 0) {
      echo "El RUT ya ha votado";
} else {

      // guardando votacion
      $sql = "INSERT INTO votos (nombre, alias, rut, email, region, comuna, candidato, web, tv, redes, amigo) VALUES ('".$nombre."', '".$alias."', '".$rut."', '".$email."', ".$region.", ".$comuna.", ".$candidato.", ".$web.", ".$tv.", ".$redes.", ".$amigo.")";
      if (mysqli_query($coneccion, $sql)) {
            echo "La votación ha sido ingresada";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($coneccion);
      }
}

include 'includes/desconectar.php';
?>