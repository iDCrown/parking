<?php
// Ruta base del proyecto
define('BASE_URL', 'http://localhost/Parking/');

// Función para redireccionar
function redirect($path) {
    header('Location: ' . BASE_URL . $path);
    exit();
}
// Inicia la sesión en todas las páginas
/* if (session_status() === PHP_SESSION_NONE) {
    session_start();
} */

