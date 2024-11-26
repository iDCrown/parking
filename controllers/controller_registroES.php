<?php
echo "El archivo PHP se está ejecutando";
die();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluimos el modelo
require_once 'models/registroModel.php'; //se trae la funcion del modelo
require_once 'db/db.php'; //conexion de la base de datos


// Verificamos si la petición es POST o GET
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibimos los datos del cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'message' => 'No se procesó la solicitud correctamente.']);

    // Recuperamos los datos de la solicitud
    $placa = $data['placa'] ?? '';
    $nombre = $data['nombre'] ?? '';
    $tipoVehiculo = $data['tipoVehiculo'] ?? '';

    // Verificamos si los datos están completos
    if ($placa && $nombre && $tipoVehiculo) {
        try {
            // Conectamos a la base de datos
            $db = conexionDB();

            // Llamamos a la función para registrar la entrada
            $resultado = registrarEntrada($db, $nombre, $placa, $tipoVehiculo);

            // Respondemos al cliente en formato JSON
            echo json_encode(['success' => $resultado]);
        } catch (Exception $e) {
            // Respondemos con un error si algo falla
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        // Si faltan datos, respondemos con un error
        echo json_encode(['success' => false, 'message' => 'Datos incompletos.']);
    }
}

// Si la solicitud es para registrar una salida (GET o POST según tu necesidad)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data['accion']) && $data['accion'] === 'salida') {
    $placa = $data['placa'] ?? '';

    // Verificamos si la placa está presente
    if ($placa) {
        try {
            // Conectamos a la base de datos
            $db = conexionDB();

            // Llamamos a la función para registrar la salida
            $resultado = registrarSalida($db, $placa);

            // Respondemos al cliente en formato JSON
            echo json_encode(['success' => $resultado]);
        } catch (Exception $e) {
            // Respondemos con un error si algo falla
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        // Si falta la placa, respondemos con un error
        echo json_encode(['success' => false, 'message' => 'Placa no proporcionada.']);
    }
}
?>
