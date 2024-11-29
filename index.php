<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//
require_once 'config/auth.php';
require_once 'controllers/controller_historial.php';
require_once 'controllers/controller_entradasVivo.php';


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
        requireAuth();
        $historial = mostrarHistoryVivo();
        include('views/dashboard.php');
        break;
    case 'historial-usuarios':
        requireAuth();
        include('views/historial-usuarios.php');
        break;
    case 'historial':
        requireAuth();
        $historial = mostrarHiatoria();
        include('views/historial.php');
        break;
    case 'vigilantes':
        requireAuth();
        include('views/registroVigilantes.php');
        break;
    case 'añadirDueño':
        requireAuth();
        include('views/formDuenos.php');
        break;
    default:
        echo "Página no encontrada";
        break;
}

