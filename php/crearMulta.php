<?php
    //Incluimos conexión
    include '../config/conexion.php';

    if(isset($_POST['crearRegistro'])){
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

                $query = "INSERT INTO multas(Fecha, Hora, Lugar, Importe, idPersona, PlacaVehiculo)VALUES('$fecha', '$hora', '$lugar', '$importe', '$idPropietario', '$idVehiculo')";
                if(!mysqli_query($con, $query)){
                    die('Error: ' . mysqli_error($con));
                    $error = "Error, no se pudo crear el registro";
                }else{
                    $mensaje = "Registro creado correctamente";
                    header('Location: ../vistas/multas.php?mensaje='.urlencode($mensaje));
                    exit();
                }

            }else{
                $error = "Cedula o Placa incorrectas";
            }
        }
    }
?>