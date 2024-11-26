<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//
require_once 'controllers/controller_historial.php';

// Incluir el archivo de configuración
include('./config/config.php');

// Verificar si se ha especificado una ruta
$route = isset($_GET['route']) ? $_GET['route'] : 'login';

// Redirigir según la ruta
switch ($route) {
    case 'login':
        include('views/login.php');
        break;
    case 'dashboard':
        include('views/dashboard.php');
        break;
    case 'clientes':
        include('views/registroClientes.php');
        break;
    case 'historial':
        mostrarHiatoria();
        include('views/historial.php');
        break;
    case 'vigilantes':
        include('views/registroVigilantes.php');
        break;
    default:
        echo "Página no encontrada";
        break;
}

