<?php
    //Incluimos conexión
    include '../config/conexion.php';
    //Obtener el id enviado de index
    $idRegistro = isset($_GET['id']) ? $_GET['id'] : null;
    if ($idRegistro === null) {
        // Manejar el caso donde idPersonas no está definido en la URL
        // Por ejemplo, redireccionar o mostrar un mensaje de error
        exit("Error: No se proporcionó el ID de la persona a editar.");
    }

    $query = "SELECT 
    m.Numero_de_Referencia,
    m.fecha, 
    m.hora, 
    m.lugar,
    m.importe,  
    p.cedula, 
    v.placa
FROM 
    multas m
INNER JOIN 
    vehiculos v 
ON 
    m.PlacaVehiculo = v.idVehiculo
INNER JOIN
    personas p
ON
    m.idPersona = p.idPersonas
WHERE m.Numero_de_Referencia = '$idRegistro'";

$multas = mysqli_query($con, $query) or die(mysqli_error($con));
// Volcar los datos de ese registro en una fila
$fila = mysqli_fetch_assoc($multas);


    if(isset($_POST['editarRegistro'])){
        $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
        $hora = mysqli_real_escape_string($con, $_POST['hora']);
        $lugar = mysqli_real_escape_string($con, $_POST['lugar']);
        $importe = mysqli_real_escape_string($con, $_POST['importe']);
        $cedulaPropietario = mysqli_real_escape_string($con, $_POST['cedulaPropietario']);
        $placa = mysqli_real_escape_string($con, $_POST['placa']);

        //Configurar tiempo zona horaria
        date_default_timezone_set('America/Bogota');
        $time = date('h:i:s a', time());

        //Validar si no están vacíos
        if(empty($fecha) || empty($hora) || empty($lugar) || empty($importe) || empty($cedulaPropietario) || empty($placa)){
            $error = "Algunos campos están vacíos";
        }else{
            $result = mysqli_query($con, "SELECT v.idVehiculo, p.idPersonas FROM vehiculos v JOIN personas p ON v.idPropietario = p.idPersonas WHERE cedula = '$cedulaPropietario'");
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $idPropietario = $row['idPersonas'];
                $idVehiculo = $row['idVehiculo'];
                $query = "UPDATE  multas set Fecha ='$fecha', Hora ='$hora', Lugar = '$lugar', Importe = '$importe', idPersona = '$idPropietario', 	PlacaVehiculo = '$idVehiculo'WHERE Numero_de_Referencia ='$idRegistro'";

            if(!mysqli_query($con, $query)){
                die('Error: ' . mysqli_error($con));
                $error = "Error, no se pudo crear el registros";
            }else{
                $mensaje = "Registro editado correctamente";
                header('Location: ../vistas/multas.php?mensaje='.urlencode($mensaje));
                exit();
            }
        }else{
            $error = "Cedula o placa del vehículo incorrectos";
        }

    }
}

?>