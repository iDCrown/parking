<?php

// Limpiar cualquier salida previa
ob_start(); 

// Deshabilitar toda la salida de errores
error_reporting(0);

// Asegurarse de que no haya espacios en blanco antes de la respuesta
header('Content-Type: application/json'); 

// Incluir archivos necesarios
try {
    require_once '../models/registroModel.php';

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (!$data) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
        exit;
    }

    $db = conexionDB();

    // Verificar si es una entrada o salida
    if (isset($data['tipo']) && $data['tipo'] === 'salida') {
        // Si es salida, registrar la salida
        $resultado = registrarSalida($db, $data['placa'], $data['tipoVehiculo']);
    } else {
        // Si es entrada, registrar la entrada
        $resultado = registrarEntrada($db, $data['cedula'], $data['placa'], $data['tipoVehiculo']);
        
        // Como la función registrarEntrada ya usa asignarEspacio y devuelve el id_espacio 
        // en el caso de éxito, podemos obtenerlo directamente de $resultado
        $resultado['espacio_asignado'] = $resultado['success'] ? $resultado['id_espacio'] : null;
    }

    echo json_encode($resultado);
    exit;

} catch (Exception $e) {
    // Capturar cualquier error y devolverlo como JSON
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Error en el servidor: ' . $e->getMessage()
    ]);
    exit;
}
?>