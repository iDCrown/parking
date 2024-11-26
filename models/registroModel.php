<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Incluye la conexión a la base de datos si no lo has hecho antes
require_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true); // Recibe los datos en formato JSON

$placa = $data['placa'];
$nombre = $data['nombre'];
$tipoVehiculo = $data['tipoVehiculo']; // Si ya lo estás recibiendo en el JSON

// Si el tipoVehiculo no se recibe en el JSON, lo obtenemos de la base de datos
$id_espacio = asignarEspacio($db, $tipoVehiculo);
if (!$tipoVehiculo) {
    $tipoVehiculo = obtenerTipoVehiculo($db, $id_espacio); // Asegúrate de definir correctamente $id_espacio
}

function registrarEntrada($db, $nombre, $placa){
  $query_verificacionEntrada = "SELECT
  dv.id_duenos_vehiculos
  FROM Dueno_vehiculos dv
  INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo
  INNER JOIN Duenos d ON dv.id_dueno = d.id_dueno
  WHERE v.placa = ? AND d.nombre = ?";

  $stmt_verificacion = $db->prepare($query_verificacionEntrada);
  if($stmt_verificacion === false) {
    // Si la preparación falla, muestra el error
    throw new Exception('Error en la preparación de la consulta: ' . $db->error);
  }
  $stmt_verificacion->bind_param("ss", $placa, $nombre);
  $stmt_verificacion->execute();
  $result = $stmt_verificacion->get_result();


// INSERTAR ENTRADA

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $id_duenos_vehiculos = $row['id_duenos_vehiculos'];

      if($id_espacio){
        $horaEntrada = date('Y-m-d H:i:s');
        $query_insert = "INSERT INTO registroacceso (horaEntrada, id_duenos_vehiculos, id_espacio) 
        VALUES (?,?,?)";

        $stmt_entrada = $db->prepare($query_insert);
        if ($stmt_entrada === false) {
            throw new Exception('Error en la preparación de la consulta de entrada: ' . $db->error);
        }

        $stmt_entrada->bind_param("sii", $horaEntrada, $id_duenos_vehiculos, $id_espacio);
        if ($stmt_entrada->execute()) {
          $query_update_estado = "UPDATE espacioparqueadero SET estado = 'Ocupado' WHERE id_espacio = ?";
          $stmt_update = $db->prepare($query_update_estado);
            if ($stmt_update === false) {
                throw new Exception('Error al actualizar el estado del espacio: ' . $db->error);
            }
            $stmt_update->bind_param("i", $id_espacio);
            $stmt_update->execute();
            return true; // Registro exitoso
        }
    }
  }
  return false;
}



function obtenerTipoEspacio($db, $id_espacio){
  $query_tipo_espacio = "SELECT tipo_espacio
                          FROM espacioparqueadero 
                          WHERE id_espacio = ?";

  $stmt = $db->prepare($query_tipo_espacio);
  if ($stmt === false) {
      throw new Exception('Error en la preparación de la consulta de tipo_vehiculo: ' . $db->error);
  }

  $stmt->bind_param("i", $id_espacio);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['tipo_espacio'];  // Devuelve el tipo de vehículo
  }

  return null;  // Si no se encuentra el tipo de vehículo
}



  //espacio aleatorio
  function asignarEspacio($db, $tipoVehiculo){
    $query = "SELECT id_espacio
              FROM espacioparqueadero
              WHERE tipo_espacio = ? AND estado = 'Disponible'
              ORDER BY RAND() LIMIT 1";  // Usamos ORDER BY RAND() para seleccionar aleatoriamente

    $stmt = $db->prepare($query);
    if ($stmt === false) {
        throw new Exception('Error en la preparación de la consulta para asignar espacio: ' . $db->error);
    }

    // Asociamos el tipo de vehículo
    $stmt->bind_param("s", $tipoVehiculo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si encontramos un espacio disponible
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id_espacio'];  // Devolvemos el id del espacio asignado
    }

    return null;  // Si no hay espacios disponibles para ese tipo de vehículo
}
  
  //SALIDA

function registrarSalida($db, $placa){
  $horaSalida = date('Y-m-d H:i:s');
  $query_update = "UPDATE registroacceso ra
  INNER JOIN Dueno_vehiculos dv ON ra.id_duenos_vehiculos = dv.id_duenos_vehiculos
  INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo
  SET ra.horaSalida = ? WHERE v.placa = ? AND ra.horaSalida IS NULL";

  $stmt = $db->prepare($query_update);
  if ($stmt === false) {
    // Si la preparación falla, muestra el error
    throw new Exception('Error en la preparación de la consulta de salida: ' . $db->error);
  }
  $stmt->bind_param("ss",$horaSalida, $placa);
  $stmt->execute();
  return $stmt->affected_rows > 0;  // Retorna true si se actualizó correctamente

}

?>