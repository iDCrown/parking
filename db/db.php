<?php 

// $host = 'localhost';
// $usuario = 'root';
// $contraseña = '';
// $base_de_datos = 'parqueaderoetitc';

// $db = new mysqli($host, $usuario, $contraseña, $base_de_datos);
// $db->set_charset("utf-8"); 

// if ($db->connect_error) {
//     die("Conexión fallida: " . $db->connect_error);
// }
function conexionDB(){
    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $base_de_datos = 'parqueaderoetitc';
    
    try {
        $db = new mysqli($host, $usuario, $contraseña, $base_de_datos);
        $db->set_charset("utf8");
        return $db; 
    } catch (Exception $e) {
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }
}

// Conectar a la base de datos
$db = conexionDB();
?>