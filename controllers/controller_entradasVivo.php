<?php 
    //MUESTRA LA CONSULTA DE LOS DATOS DE LA TABLA
    require_once __DIR__ . '/../models/historialModel.php'; //se trae la funcion del modelo
    require_once __DIR__ . '/../db/db.php'; //conexion de la base de datos

if (isset($_GET['action']) && $_GET['action'] === 'getHistoryVivo') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $historialVivo = mostrarHistoryVivo();

    if (!$historialVivo) {
        http_response_code(500);
        echo json_encode(['error' => 'No se pudo obtener el historial']);
        exit;
    }
    
    // Convertir resultado a array
    $resultado = [];
    while ($fila = mysqli_fetch_assoc($historialVivo)) {
        $resultado[] = $fila;
    }
    
    // Depuración
    error_log('Datos enviados: ' . print_r($resultado, true));
    
    // Devolver como JSON
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($resultado);
    exit;
}
    function mostrarHistoryVivo() {
        $db = conexionDB();
        $historial = getHistoryVivo($db);
        mysqli_close($db);
        return $historial;
    }   
?>