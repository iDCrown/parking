<?php
require '../models/registroVigilanteModels.php';
require_once '../db/db.php';

// Función para crear el usuario
function createUser($nombre, $apellido) {
    if ($nombre && $apellido) {
        $userNew = strtolower($nombre . '_' . $apellido . '123');
        return $userNew;
    } else {
        echo "No se encontraron los datos proporcionados.";
        return null;
    }
}

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $cedula_usuario = $_POST['cedula_usuario'] ?? null;
    $celular = $_POST['celular'] ?? null;
    $correo = $_POST['correo'] ?? null;

    // Generar usuario a partir del nombre y apellido
    $user = createUser($nombre, $apellido);
    // Establecer password igual a la cédula
    $password = $cedula_usuario;
    $rol = "Vigilante";

    // Mostrar datos de depuración
    echo "Nombre: $nombre<br>";
    echo "Apellido: $apellido<br>";
    echo "Cédula: $cedula_usuario<br>";
    echo "Celular: $celular<br>";
    echo "Correo: $correo<br>";
    echo "Usuario: $user<br>";
    echo "Contraseña: $password<br>";
    echo "Rol: $rol<br>";

    // Validar que todos los campos requeridos estén presentes
    if ($nombre && $apellido && $cedula_usuario && $celular && $user && $correo && $password && $rol) {
        $db = conexionDB();

        // Insertar datos en la base de datos
        $id_usuario = insertarUsuario($nombre, $apellido, $cedula_usuario, $celular, $user, $correo, $password, $rol);
        if ($id_usuario) {
            header("Location: http://localhost/Parking/historial-usuarios");
            exit;
        } else {
            echo "Error al insertar en la base de datos.";
        }
    } else {
        echo "Error en el registro. Por favor, complete todos los campos.";
    }
}
?>
