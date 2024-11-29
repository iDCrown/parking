<?php
require_once '../db/db.php';

function insertarUsuario($nombre, $apellido, $cedula_usuario, $celular, $user, $correo, $password, $rol) {
    $conexion = conexionDB();
    $sql = "INSERT INTO usuario (nombre, apellido, cedula_usuario, celular, user, correo, password, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        echo "Error en la preparación de la consulta: " . $conexion->error;
        return false;
    }

    $stmt->bind_param("ssssssss", $nombre, $apellido, $cedula_usuario, $celular, $user, $correo, $password, $rol);
    if ($stmt->execute()) {
        return $conexion->insert_id;
    } else {
        echo "Error en la ejecución de la consulta: " . $stmt->error;
        return false;
    }
}
?>
