<?php 
    //MUESTRA LA CONSULTA DE LOS DATOS DE LA TABLA
    require_once 'models/historialModel.php'; //se trae la funcion del modelo
    require_once 'db/db.php'; //conexion de la base de datos

    function mostrarHistoryVivo() {
        $db = conexionDB();
        $historial = getHistoryVivo($db);
        mysqli_close($db);
        return $historial;
        /* include(__DIR__ . '/../views/dashboard.php'); */
    }   
?>