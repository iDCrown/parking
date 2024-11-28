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
        nombre AS nombre_dueno,
        apellido AS apellido_dueno,
        cedula AS cedula_dueno,
        lower(correo) AS correo_dueno,
        Rol_dueno
        FROM Duenos";

    $stmt = $db->prepare($query_dueno);
    if ($stmt === false) {
        throw new Exception('Error en la preparación de la consulta: ' . $db->error);
    }
    $stmt->execute();
    return $stmt->get_result();
}
header('Content-Type: application/json'); 
?>