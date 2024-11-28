<?php
// Habilitar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../db/db.php';
require_once '../models/historialUsuarioModel.php';

// Asegurarse de que no haya espacios en blanco antes de la salida
header("Content-Type: application/json; charset=UTF-8");

// Recibir datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar datos recibidos
if (!$data || !isset($data['tipoUsuario'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Datos inválidos o faltantes']);
    exit;
}

// Obtener conexión a la base de datos
$db = conexionDB();
if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Fallo en la conexión a la base de datos']);
    exit;
}

error_log(print_r($data, true));

try {
    // Validar tipo de usuario y obtener resultados
    if ($data['tipoUsuario'] === 'dueno') {
        $resultado = fetchAll(mostrarDueno($db));
    } else {
        $resultado = fetchAll(mostrarUsuario($db, $data['tipoUsuario']));
    }

    // Responder con un JSON válido
    http_response_code(200);
    echo json_encode($resultado);

} catch (Exception $e) {
    // Capturar y devolver cualquier error
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    exit;
}

// Función auxiliar para convertir resultados a arrays

function fetchAll($result) { 
    $rows = []; 
    if (!$result) {
         throw new Exception("No se obtuvieron resultados de la consulta."); 
    }
    while ($row = $result->fetch_assoc()) {
         $rows[] = $row; 
        } 
    return $rows; 
}
?>
