<?php
require_once __DIR__ .  '/../db/db.php'; // Asegúrate de que la conexión esté correctamente configurada

// EspaciosVivoModel.php
function getSpaces($db) {
    $query_espacios = "SELECT 
        SUM(CASE WHEN tipo_espacio = ? AND estado = ? THEN 1 ELSE 0 END) as espacios_auto,
        SUM(CASE WHEN tipo_espacio = ? AND estado = ? THEN 1 ELSE 0 END) as espacios_moto,
        COUNT(CASE WHEN estado = ? THEN 1 ELSE NULL END) as total_asignados
    FROM espacioparqueadero";

    // Preparar la consulta
    $stmt = $db->prepare($query_espacios);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $db->error);
    }

    // Vincular parámetros
    $tipo_auto = 'Auto';
    $estado_disponible = 'Disponible';
    $tipo_moto = 'Moto';
    $estado_ocupado = 'Ocupado';
    
    $stmt->bind_param('sssss', $tipo_auto, $estado_disponible, $tipo_moto, $estado_disponible, $estado_ocupado);

    // Ejecutar y obtener resultados
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    return $result->fetch_assoc();
}
?>