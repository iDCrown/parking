<?php
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
    case 'historial-usuarios':
        include('views/historial-usuarios.php');
        break;
    case 'historial':
        include('views/historial.php');
        break;
    case 'vigilantes':
        include('views/registroVigilantes.php');
        break;
    case 'añadirDueño':
        include('views/formDuenos.php');
        break;
    default:
        echo "Página no encontrada";
        break;
}

