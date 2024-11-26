<?php 
    require_once 'models/historialModel.php'; //se trae la funcion del modelo
    require_once 'db/db.php'; //conexion de la base de datos

    function mostrarHiatoria() {
        $db = conexionDB();
        $historial = getHistory($db);
        include(__DIR__ . '/../views/historial.php');
    }
?>