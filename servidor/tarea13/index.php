<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pronóstico del Tiempo</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="datos">
    <form method="post">
      <label for="ciudad">Ciudad:</label>
      <select name="ciudad" id="ciudad" required>
        <option value="" disabled selected>Escoge una ciudad</option>
        <option value="303121">Zamora</option>
        <option value="307142">Burgos</option>
        <option value="307145">Valladolid</option>
        <option value="303118">Ávila</option>
        <option value="307144">Salamanca</option>
        <option value="303117">Soria</option>
        <option value="307143">León</option>
        <option value="303120">Segovia</option>
        <option value="303119">Palencia</option>
      </select>
      <label for="cantidadDias">Cantidad de Días:</label>
      <input name="cantidadDias" type="number" max="5" min="1">
      <input type="submit" value="Obtener Pronóstico">
    </form>
  </div>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciudad = $_POST["ciudad"];
    $cantidadDias = intval($_POST["cantidadDias"]);
    $apikey = "IKYE5mRX63101lQhgWBqhihS4hTtzTmA";
    $url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/" . $ciudad . "?apikey=" . $apikey . "&language=es-es&metric=true";

    // Lista de ciudades y sus códigos
    $ciudades = [
      "303121" => "Zamora",
      "307142" => "Burgos",
      "307145" => "Valladolid",
      "303118" => "Ávila",
      "307144" => "Salamanca",
      "303117" => "Soria",
      "307143" => "León",
      "303120" => "Segovia",
      "303119" => "Palencia"
    ];

    $nombreCiudad = isset($ciudades[$ciudad]) ? $ciudades[$ciudad] : "Desconocida";

    // Obtener el contenido del archivo
    $response = file_get_contents($url);

    // Decodificar la respuesta JSON
    $forecast = json_decode($response, true);

    // Mostrar el pronóstico
    if ($forecast) {
      $count = 0;
      foreach ($forecast["DailyForecasts"] as $day) {
        if ($count < $cantidadDias) {
          echo "<div class='prediccion'>";
          echo "<h2>".$nombreCiudad."</h2>";
          echo "<p><strong>Fecha:</strong> " . date("Y-m-d", strtotime($day["Date"])) . "</p>";
          echo "<p><strong>Temperatura Mínima:</strong> " . $day["Temperature"]["Minimum"]["Value"] . "°C</p>";
          echo "<p><strong>Temperatura Máxima:</strong> " . $day["Temperature"]["Maximum"]["Value"] . "°C</p>";
          echo "<p><strong>Estado del Clima:</strong> " . $day["Day"]["IconPhrase"] . "</p>";
          if (isset($day["Day"]["PrecipitationProbability"])) {
            echo "<p><strong>Probabilidad de Lluvia:</strong> " . $day["Day"]["PrecipitationProbability"] . "%</p>";
          } else {
            echo "<p><strong>Probabilidad de Lluvia:</strong> No disponible</p>";
          }
          echo "</div>";
          $count++;
        }
      }
    } else {
      echo "<p>Error al obtener los datos</p>";
    }
  }
  ?>
</body>
</html>


