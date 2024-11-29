<?php
session_start();

function isAuthenticated() {
    return !empty($_SESSION["id_usuario"]);
}

function requireAuth() {
    if (!isAuthenticated()) {
        header("Location: login");
        exit; // Detener ejecución
    }
}

