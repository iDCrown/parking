<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function mostrarUsuario($db, $tipo_usuario) {
    $query_usuarios = "SELECT 
        nombre AS nombre_usuario,
        apellido AS apellido_usuario,
        cedula_usuario,
        celular,
        correo
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
    v.tipo AS tipo_vehiculo, 
    v.placa, 
    d.nombre, 
    d.apellido, 
    d.cedula, 
    d.correo 
    AS correo_dueno, 
    d.Rol_dueno 
    FROM Dueno_vehiculos dv 
    INNER JOIN Duenos d ON dv.id_dueno = d.id_dueno 
    INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo 
    GROUP BY d.nombre, d.apellido, d.cedula, d.correo, d.Rol_dueno";
        

    $stmt = $db->prepare($query_dueno);
    if ($stmt === false) {
        throw new Exception('Error en la preparación de la consulta: ' . $db->error);
    }
    $stmt->execute();
    return $stmt->get_result();
}
header('Content-Type: application/json'); 
?>