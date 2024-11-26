<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php'; // Incluye tu archivo de conexión a la base de datos

$data = json_decode(file_get_contents('php://input'), true); // Recibe los datos en formato JSON

$tipo_usuario = $data['tipoUsuario'] ?? null;

if ($tipo_usuario) {
    try {
        $resultados = mostrarHistorialUsuario($db, $tipo_usuario);
        $registros = $resultados->fetch_all(MYSQLI_ASSOC); // Convierte los resultados a un array asociativo
        echo json_encode($registros);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Tipo de usuario no especificado.']);
}

function mostrarHistorialUsuario($db, $tipo_usuario) {
    if ($tipo_usuario === "dueno") {
        return mostrarDueno($db);
    } else {
        return mostrarUsuario($db, $tipo_usuario);
    }
}

function mostrarUsuario($db, $tipo_usuario) {
    $query_usuarios = "SELECT 
        nombre AS nombre_usuario,
        apellido AS apellido_usuario,
        cedula_usuario,
        correo,
        rol
        FROM usuario 
        WHERE rol = ?";

    $stmt = $db->prepare($query_usuarios);
    if ($stmt === false) {
        throw new Exception('Error en la preparación de la consulta: ' . $db->error);
    }
    $stmt->bind_param("s", $tipo_usuario);
    $stmt->execute();
    return $stmt->get_result();
}

function mostrarDueno($db) {
    $query_dueno = "SELECT 
        nombre AS nombre_dueno,
        apellido AS apellido_dueno,
        cedula AS cedula_dueno,
        Rol_dueno
        FROM dueno";

    $stmt = $db->prepare($query_dueno);
    if ($stmt === false) {
        throw new Exception('Error en la preparación de la consulta: ' . $db->error);
    }
    $stmt->execute();
    return $stmt->get_result();
}
