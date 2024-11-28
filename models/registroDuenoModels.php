<?php
require_once 'db.php';

function insertarDueno($nombre, $apellido, $cedula, $rol_dueno) {
    $conexion = conexionDB();
    $sql = "INSERT INTO duenos (nombre, apellido, cedula, Rol_dueno) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $apellido, $cedula, $rol_dueno);

    if ($stmt->execute()) {
        return $conexion->insert_id;
    }
    return false;
}

function insertarVehiculo($tipo, $placa) {
    $conexion = conexionDB();
    $sql = "INSERT INTO vehiculo (tipo, placa) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $tipo, $placa);

    if ($stmt->execute()) {
        return $conexion->insert_id;
    }
    return false;
}

function relacionarDuenoVehiculo($id_dueno, $id_vehiculo) {
    $conexion = conexionDB();
    $sql = "INSERT INTO dueno_vehiculos (id_dueno, id_vehiculo) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $id_dueno, $id_vehiculo);

    return $stmt->execute();
}
