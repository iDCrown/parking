<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
var_dump($data);
// Incluye la conexión a la base de datos y funciones
require_once 'db.php'; // Archivo con la conexión a la base de datos
require_once 'models/historialUsuarioModel.php'; // Archivo con las funciones del modelo

// Verifica que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el cuerpo de la solicitud (en formato JSON)
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica si se recibió el parámetro 'tipoUsuario'
    if (isset($data['tipoUsuario'])) {
        $tipo_usuario = $data['tipoUsuario'];

        try {
            // Llama a la función 'mostrarHistorialUsuario' con el tipo de usuario
            $result = mostrarHistorialUsuario($db, $tipo_usuario);

            // Inicializa el array de registros
            $registros = [];

            // Verifica si se obtuvieron resultados de la base de datos
            if ($result && $result->num_rows > 0) {
                // Recorrer los resultados y almacenarlos en el array $registros
                while ($row = $result->fetch_assoc()) {
                    $registros[] = $row;
                }
            }

            // Envía los resultados al cliente en formato JSON
            header('Content-Type: application/json');
            echo json_encode($registros);

        } catch (Exception $e) {
            // Maneja errores y envía una respuesta con el mensaje de error
            header('Content-Type: application/json', true, 500);
            echo json_encode(['error' => $e->getMessage()]);
        }

    } else {
        // Devuelve un error si 'tipoUsuario' no está presente
        header('Content-Type: application/json', true, 400);
        echo json_encode(['error' => 'Falta el parámetro tipoUsuario.']);
    }

} else {
    // Devuelve un error si el método HTTP no es POST
    header('Content-Type: application/json', true, 405);
    echo json_encode(['error' => 'Método no permitido.']);
}
