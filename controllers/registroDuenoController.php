<?php
require '../models/registroDuenoModels.php';

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $rol_dueno = $_POST['rol_dueno'];
    $placa = $_POST['placa'];
    $tipo_vehiculo = $_POST['tipo_vehiculo'];

    // Inserta en la tabla duenos
    $id_dueno = insertarDueno($nombre, $apellido, $cedula, $rol_dueno);

    // Inserta en la tabla vehiculo
    $id_vehiculo = insertarVehiculo($tipo_vehiculo, $placa);

    // Relaciona dueño y vehículo
    if ($id_dueno && $id_vehiculo) {
        relacionarDuenoVehiculo($id_dueno, $id_vehiculo);
        // Redirige a historial-usuarios
        header("Location: http://localhost/Parking/historial-usuarios");
        exit;
    } else {
        echo "Error en el registro. Por favor, intente nuevamente.";
    }
}
