  <?php
    include 'includes/conectar.php';
    include 'includes/carga_inicial.php';
    include 'includes/desconectar.php';
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Formulario Desis</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/jquery.js"></script>
  <script src="js/funciones.js"></script>
</head>

<body>
  <?php
  if ($_POST) {
    var_dump($_POST);
  }
  ?>
  <H1>Formulario de Votación.</h1>
  <form id="formulario" action="" method="post">
    <section>
      <table>
        <tbody>
          <tr>
            <td>
              <label for="nombre">Nombre y Apellido:</label> 
            </td>
            <td>
              <input type="text" id="nombre" name="nombre">
              <label for="nombre">(obligatorio)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <label for="alias">Alias:</label>
            </td>
            <td>
              <input type="text" id="alias" name="alias">
              <label for="alias">(obligatorio. Mínimo 5 caracteres.)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <label for="rut">RUT:</label>
            </td>
            <td>
              <input type="text" id="rut" name="rut">
              <label for="rut">(obligatorio)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <label for="email">Email:</label>
            </td>
            <td>
              <input type="text" id="email" name="email">
              <label for="email">(obligatorio)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <label for="region">Región:</label>
            </td>
            <td>
              <select id="region" name="region" onChange="seleccionar_comuna(this.value);">
                <option value="0">Selecciona Región</option>
                <?php
                  foreach ($resultado_regiones as $region) {
                    echo "<option value='".$region['id']."'>".$region['nombre']."</option>";
                    }

                ?>
              </select>
              <label for="region">(obligatorio)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <label for="comuna">Comuna:</label>
            </td>
            <td id="seleccion_comuna">
              <select id="comuna" name="comuna">
                <option value="0">Selecciona Comuna</option>
              </select>
              <label for="comuna">(obligatorio)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <label for="candidato">Candidato:</label>
            </td>
            <td>
              <select id="candidato" name="candidato">
                <option value="0">Selecciona Candidato</option>
                <?php
                  foreach ($resultado_candidatos as $region) {
                    echo "<option value='".$region['id']."'>".$region['nombre']."</option>";
                    }

                ?>
              </select>
              <label for="candidatos">(obligatorio)</label> 
            </td>
          </tr>
          <tr>
            <td>
              <span >Como se enteró de nosotros:</span><br>
              <span>(seleccionar mínimos 2.)</span>
            </td>
            <td>
              <input class="check" type="checkbox" id="web" name="web" value="web">
              <label for="web">Web</label>
              <input class="check" type="checkbox" id="tv" name="tv" value="tv">
              <label for="tv">TV</label>
              <input class="check" type="checkbox" id="redes" name="redes" value="redes">
              <label for="redes">Redes Sociales</label>
              <input class="check" type="checkbox" id="amigo" name="amigo" value="amigo">
              <label for="amigo">Amigo</label>
            </td>
          </tr>
          <tr>
            <td>
              <input type="button" value="Enviar" onClick="enviar()";>
            </td>
            <td>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </form>
  <div id="exito">
  </div>
</body>
</html>