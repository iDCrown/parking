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

// Seleccionar datos
$query = "SELECT vehiculos.*, personas.nombre, personas.apellidos, personas.cedula
          FROM vehiculos
          INNER JOIN personas ON vehiculos.idPropietario = personas.idPersonas
          WHERE vehiculos.idVehiculo = '$idRegistro'";
$vehiculos = mysqli_query($con, $query) or die(mysqli_error($con));

// Volcar los datos de ese registro en una fila
$fila = mysqli_fetch_assoc($vehiculos);
/*     //Seleccionar datos
    $query = "SELECT vehiculos.*, personas.nombre, personas.apellidos, personas.cedula as cedulaPropietario 
          FROM vehiculos
          INNER JOIN personas ON vehiculos.idPropietario = personas.idPersonas
          WHERE vehiculos.idVehiculo = '$idRegistro'";
    $vehiculos = mysqli_query($con, $query) or die (mysqli_error($con));

    //Volcamos los datos de ese registro en una fila
    $fila = mysqli_fetch_assoc($vehiculos); */



    if(isset($_POST['editarRegistro'])){
        $placa = mysqli_real_escape_string($con, $_POST['placa']);
        $marca = mysqli_real_escape_string($con, $_POST['marca']);
        $modelo = mysqli_real_escape_string($con, $_POST['modelo']);
        $precio = mysqli_real_escape_string($con, $_POST['precio']);
        $cedulaPropietario = mysqli_real_escape_string($con, $_POST['cedulaPropietario']);

        //Configurar tiempo zona horaria
        date_default_timezone_set('America/Bogota');
        $time = date('h:i:s a', time());

        //Validar si no están vacíos
        if(empty($placa) || empty($marca) || empty($modelo) || empty($precio) || empty($cedulaPropietario)){
            $error = "Algunos campos están vacíos";
        }else{
            $result = mysqli_query($con, "SELECT idPersonas FROM personas WHERE cedula = $cedulaPropietario");
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $idPropietario = $row['idPersonas'];
                $query = "UPDATE vehiculos set placa = '$placa', marca='$marca', modelo='$modelo', precio = '$precio', idPropietario = '$idPropietario'WHERE idVehiculo ='$idRegistro'";

            if(!mysqli_query($con, $query)){
                die('Error: ' . mysqli_error($con));
                $error = "Error, no se pudo crear el registros";
            }else{
                $mensaje = "Registro editado correctamente";
                header('Location: ../vistas/vehiculos.php?mensaje='.urlencode($mensaje));
                exit();
            }
        }else{
            $error = "No se encuentra la cedula $cedulaPropietario registrada en el sistema";
        }

    }
}

?>