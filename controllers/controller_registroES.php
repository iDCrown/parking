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
        $resultado = registrarSalida($db, $data['placa'], $data['tipoVehiculo']);
    } else {
        $resultado = registrarEntrada($db, $data['cedula'], $data['placa'], $data['tipoVehiculo']);
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