<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require_once '../db/db.php';

// Modificamos la función para que maneje más casos
function registrarEntrada($db, $cedula, $placa, $tipoVehiculo){
  // Primero, verificamos si el vehículo y el dueño existen
  $query_verificacionEntrada = "SELECT
  dv.id_duenos_vehiculos, d.id_dueno, v.id_vehiculo
  FROM Dueno_vehiculos dv
  INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo
  INNER JOIN Duenos d ON dv.id_dueno = d.id_dueno
  WHERE v.placa = ? AND d.cedula = ?";

  $stmt_verificacion = $db->prepare($query_verificacionEntrada);
  if($stmt_verificacion === false) {
    error_log('Error en la preparación de la consulta: ' . $db->error);
    return ['success' => false, 'message' => 'Error en la consulta inicial'];
  }
  
  $stmt_verificacion->bind_param("ss", $placa, $cedula);
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

  function registrarSalida($db, $placa, $tipoVehiculo) {
    // Verificar si el vehículo existe y coincide con el tipo
    $query_verificacion = "SELECT 
      v.id_vehiculo, 
      v.placa, 
      v.tipo AS tipo_vehiculo,
      ra.id_registro AS id_registroacceso
    FROM vehiculo v
    LEFT JOIN Dueno_vehiculos dv ON v.id_vehiculo = dv.id_vehiculo
    LEFT JOIN registroacceso ra ON dv.id_duenos_vehiculos = ra.id_duenos_vehiculos
    WHERE v.placa = ? AND v.tipo = ? AND ra.horaSalida IS NULL";
  
    $stmt_verificacion = $db->prepare($query_verificacion);
    if($stmt_verificacion === false) {
      error_log('Error en la preparación de la consulta: ' . $db->error);
      return ['success' => false, 'message' => 'Error en la verificación inicial'];
    }
    
    $stmt_verificacion->bind_param("ss", $placa, $tipoVehiculo);
    $stmt_verificacion->execute();
    $result = $stmt_verificacion->get_result();
  
    // Si no se encuentra el vehículo o no coincide el tipo
    if($result->num_rows === 0) {
      // Verificar si la placa existe pero no coincide el tipo
      $query_placa_existe = "SELECT tipo_vehiculo FROM vehiculo WHERE placa = ?";
      $stmt_placa = $db->prepare($query_placa_existe);
      $stmt_placa->bind_param("s", $placa);
      $stmt_placa->execute();
      $result_placa = $stmt_placa->get_result();
  
      if ($result_placa->num_rows > 0) {
        $row_placa = $result_placa->fetch_assoc();
        return [
          'success' => false, 
          'message' => "La placa {$placa} corresponde a un {$row_placa['tipo_vehiculo']}, no a un {$tipoVehiculo}"
        ];
      }
  
      return ['success' => false, 'message' => 'No hay registro de entrada para este vehículo'];
    }
  
    // Registrar la salida
    $horaSalida = date('Y-m-d H:i:s');
    $row = $result->fetch_assoc();
  
    // Actualizar hora de salida
    $query_update = "UPDATE registroacceso SET horaSalida = ? WHERE id_registro = ?";
    $stmt_salida = $db->prepare($query_update);
    if ($stmt_salida === false) {
      error_log('Error en la preparación de la consulta de salida: ' . $db->error);
      return ['success' => false, 'message' => 'Error al registrar la salida'];
    }
  
    $stmt_salida->bind_param("si", $horaSalida, $row['id_registroacceso']);
    if (!$stmt_salida->execute()) {
      return ['success' => false, 'message' => 'Error al actualizar la salida'];
    }
  
    // Liberar el espacio de parqueo
    $query_liberar_espacio = "UPDATE espacioparqueadero ep
      JOIN registroacceso ra ON ep.id_espacio = ra.id_espacio
      SET ep.estado = 'Disponible'
      WHERE ra.id_registro = ?";
    $stmt_liberar = $db->prepare($query_liberar_espacio);
    $stmt_liberar->bind_param("i", $row['id_registroacceso']);
    $stmt_liberar->execute();
  
    return [
      'success' => true, 
      'message' => 'Salida registrada correctamente'
    ];
  }