<?php
function getHistory($db) {
  $query_historial = "SELECT
    ra.horaEntrada,
    ra.horaSalida,
    v.tipo AS tipo_vehiculo,
    v.placa,
    d.nombre,
    d.apellido,
    d.Rol_dueno,
    d.cedula,
    ep.numero_espacio,
    ep.tipo_espacio,
    ep.estado 
    FROM registroacceso ra
    INNER JOIN Dueno_vehiculos dv ON ra.id_duenos_vehiculos = dv.id_duenos_vehiculos
    INNER JOIN vehiculo v ON dv.id_vehiculo = v.id_vehiculo
    INNER JOIN Duenos d ON dv.id_dueno = d.id_dueno
    INNER JOIN espacioparqueadero ep ON ra.id_espacio = ep.id_espacio
    WHERE ra.horaSalida IS NOT NULL
    ORDER BY ra.horaEntrada";
    
    $stmt = $db->prepare($query_historial);
    if ($stmt === false) {
      // Si la preparación falla, muestra el error
      die('Error en la preparación de la consulta: ' . $db->error);
    }
    $stmt->execute();
    return $stmt->get_result();
}
?>