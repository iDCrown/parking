<?php 
function verificarEntrada($db) {
    $query_verificacionEntrada = "SELECT
    d.nombre,
    v.placa
    FROM Dueno_vehiculos dv
    INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo
    INNER JOIN Duenos d ON dv.id_dueno = d.id_dueno
    WHERE v.placa = ? AND d.ombre = ?";

    $stmt = $db->prepare($query_verificacionEntrada);
    if($stmt = false) {
         // Si la preparación falla, muestra el error
        die('Error en la preparación de la consulta: ' . $db->error);
    }
    $stmt->bind_param("ss", $placa, $nombre);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>