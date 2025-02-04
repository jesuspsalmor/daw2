<?php
//GET
///get todos los jugadores
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $res = curl_exec($ch);
// print_r($res);
// curl_close($ch);

//get jugadorID

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/1");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $res = curl_exec($ch);
// print_r($res);
// curl_close($ch);

//get jugador con params
//  $ch = curl_init();
//  curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/?Nombre=a&sueldomax=90000&Posicion=Portero");
//  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//  $res = curl_exec($ch);
//  print_r($res);
//  curl_close($ch);

//Post jugador
// $ch = curl_init();
// $fields = array(
//     'codEquipo' => '1',
//     'nombre' => 'Juanjopoooo',
//     'posicion' => 'Defensa',
//     'sueldo' => '50000'
// );
// $data_string = json_encode($fields);

// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string)
// ));

// $res = curl_exec($ch);
// if ($res === false) {
//     echo 'Error: ' . curl_error($ch);
// } else {
//     echo 'Respuesta: ' . $res;
// }

// curl_close($ch);

//put jugador
// $ch = curl_init();
// $fields = array(
//     'CodJugador' => '1', // ID del jugador que deseas actualizar
//     'CodEquipo' => '1',
//     'Nombre' => 'Juanjopoooo Actualizado',
//     'Posicion' => 'Mediocampista',
//     'Sueldo' => '55000'
// );
// $data_string = json_encode($fields);

// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/1"); // Asegúrate de que la URL y el ID sean correctos
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // Indicar que es una solicitud PUT
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string)
// ));

// $res = curl_exec($ch);
// if ($res === false) {
//     echo 'Error: ' . curl_error($ch);
// } else {
//     echo 'Respuesta: ' . $res;
// }

// curl_close($ch);

//DELETE JUGADOR
// $ch = curl_init();
// $codJugador = 1; // ID del jugador que deseas eliminar

// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/" . $codJugador); // Asegúrate de que la URL y el ID sean correctos
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Indicar que es una solicitud DELETE
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string

// $res = curl_exec($ch);
// if ($res === false) {
//     echo 'Error: ' . curl_error($ch);
// } else {
//     echo 'Respuesta: ' . $res;
// }

// curl_close($ch);


//get equipos
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos");
//  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $res = curl_exec($ch);
//   print_r($res);
//  curl_close($ch);

//get quipo por id
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos/1"); // Reemplaza '1' por el ID del equipo que deseas obtener
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $res = curl_exec($ch);
// print_r($res);
// curl_close($ch);

//post equipo
// $ch = curl_init();
// $fields = array(
//     'localidad' => 'Palma',
//     'nombre' => 'Equipo Ejemplo'
// );
// $data_string = json_encode($fields);

// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string)
// ));

// $res = curl_exec($ch);
// if ($res === false) {
//     echo 'Error: ' . curl_error($ch);
// } else {
//     echo 'Respuesta: ' . $res;
// }

// curl_close($ch);

//put Equipo

// $ch = curl_init();
// $fields = array(
//     'CodEquipo' => '10', // ID del equipo que deseas actualizar
//     'Localidad' => 'Palma Actualizado',
//     'Nombre' => 'Equipo Ejemplo Actualizado'
// );
// $data_string = json_encode($fields);

// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos/1"); // Asegúrate de que la URL y el ID sean correctos
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // Indicar que es una solicitud PUT
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string)
// ));

// $res = curl_exec($ch);
// if ($res === false) {
//     echo 'Error: ' . curl_error($ch);
// } else {
//     echo 'Respuesta: ' . $res;
// }

// curl_close($ch);
//deleteEquipo
// $ch = curl_init();
// $codEquipo = 10; // ID del equipo que deseas eliminar

// curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos/" . $codEquipo); // Asegúrate de que la URL y el ID sean correctos
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Indicar que es una solicitud DELETE
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string

// $res = curl_exec($ch);
// if ($res === false) {
//     echo 'Error: ' . curl_error($ch);
// } else {
//     echo 'Respuesta: ' . $res;
// }

// curl_close($ch);
