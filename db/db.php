<?php 

$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'parqueaderoetitc';

$db = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}
