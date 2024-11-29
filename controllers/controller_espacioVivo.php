<?php
require_once __DIR__ . '/../models/EspaciosVivoModel.php';
require_once __DIR__ . '/../models/registroModel.php';
require_once __DIR__ . '/../db/db.php';

// Acción para obtener los espacios
if (isset($_GET['action']) && $_GET['action'] === 'getSpaces') {
    // Usamos la función que ya tienes definida para obtener los espacios
    $spaces = getSpaces($db); 

    // Devolvemos los datos SIN espacio asignado
    if ($spaces) {
        header('Content-Type: application/json');
        echo json_encode([
            'espacios_auto' => $spaces['espacios_auto'],
            'espacios_moto' => $spaces['espacios_moto'],
            'total_asignados' => $spaces['total_asignados']
            // Eliminamos 'espacio_asignado'
        ]);
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'No se pudo obtener los datos']);
    }
}
?>