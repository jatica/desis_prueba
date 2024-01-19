<?php
include 'includes/conectar.php';
  

// recuperar id
$region_id = $_POST['id'];
// consulta regiones
$resultado = mysqli_query($coneccion, "SELECT * FROM comunas where region_id = ".$region_id);

// genera html para el select de comunas segun la region

echo "<select id='comuna' name='comuna'>";
echo "<option value='0'>Selecciona Comuna</option>";
foreach ($resultado as $comuna) {
	echo "<option value='".$comuna['id']."'>".$comuna['nombre']."</option>";
}
echo "</select>";

include 'includes/desconectar.php';
?>