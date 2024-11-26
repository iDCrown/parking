<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require_once '../db/db.php';

// Modificamos la función para que maneje más casos
function registrarEntrada($db, $nombre, $placa, $tipoVehiculo){
  // Primero, verificamos si el vehículo y el dueño existen
  $query_verificacionEntrada = "SELECT
  dv.id_duenos_vehiculos, d.id_dueno, v.id_vehiculo
  FROM Dueno_vehiculos dv
  INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo
  INNER JOIN Duenos d ON dv.id_dueno = d.id_dueno
  WHERE v.placa = ? AND d.nombre = ?";

  $stmt_verificacion = $db->prepare($query_verificacionEntrada);
  if($stmt_verificacion === false) {
    error_log('Error en la preparación de la consulta: ' . $db->error);
    return ['success' => false, 'message' => 'Error en la consulta inicial'];
  }
  
  $stmt_verificacion->bind_param("ss", $placa, $nombre);
  $stmt_verificacion->execute();
  $result = $stmt_verificacion->get_result();

  // Si el vehículo y dueño existen
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $id_duenos_vehiculos = $row['id_duenos_vehiculos'];

    // Buscamos un espacio disponible
    $id_espacio = asignarEspacio($db, $tipoVehiculo);
    
    if($id_espacio){
      $horaEntrada = date('Y-m-d H:i:s');
      
      // Insertamos el registro de entrada
      $query_insert = "INSERT INTO registroacceso (horaEntrada, id_duenos_vehiculos, id_espacio) 
      VALUES (?,?,?)";

      $stmt_entrada = $db->prepare($query_insert);
      if ($stmt_entrada === false) {
          error_log('Error en la preparación de la consulta de entrada: ' . $db->error);
          return ['success' => false, 'message' => 'Error al preparar inserción de entrada'];
      }

      $stmt_entrada->bind_param("sii", $horaEntrada, $id_duenos_vehiculos, $id_espacio);
      if ($stmt_entrada->execute()) {
        // Actualizamos el estado del espacio
        $query_update_estado = "UPDATE espacioparqueadero SET estado = 'Ocupado' WHERE id_espacio = ?";
        $stmt_update = $db->prepare($query_update_estado);
        if ($stmt_update === false) {
            error_log('Error al preparar actualización de estado: ' . $db->error);
            return ['success' => false, 'message' => 'Error al actualizar estado de espacio'];
        }
        $stmt_update->bind_param("i", $id_espacio);
        $stmt_update->execute();
        
        return ['success' => true, 'message' => 'Entrada registrada correctamente', 'id_espacio' => $id_espacio];
      }
    } else {
      return ['success' => false, 'message' => 'No hay espacios disponibles para este tipo de vehículo'];
    }
  } else {
    return ['success' => false, 'message' => 'Vehículo o dueño no registrado'];
  }
  
  return ['success' => false, 'message' => 'Error desconocido'];
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
// Al final del archivo registroModel.php
header('Content-Type: application/json');  // Asegura que la respuesta sea JSON
echo json_encode(['success' => true]);  // Enviar una respuesta exitosa
?>