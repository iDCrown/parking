<?php

// Limpiar cualquier salida previa
ob_start(); 

// Deshabilitar toda la salida de errores
error_reporting(0);

// Asegurarse de que no haya espacios en blanco antes de la respuesta
header('Content-Type: application/json'); 

// Incluir archivos necesarios
require_once '../models/registroModel.php';

// Recibir datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar datos recibidos
if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
    exit;
}

// Obtener conexión a la base de datos
$db = conexionDB();

// Llamar a la función de registro
$resultado = registrarEntrada($db, $data['nombre'], $data['placa'], $data['tipoVehiculo']);

// Enviar respuesta JSON
ob_end_clean();

// Enviar respuesta JSON
echo json_encode($resultado);

exit;
?>