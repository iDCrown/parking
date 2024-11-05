<?php
    //Incluimos conexión
    include '../config/conexion.php';

    if(isset($_POST['crearRegistro'])){
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
                $query = "INSERT INTO vehiculos(placa, marca, modelo, precio, idPropietario)VALUES('$placa', '$marca', '$modelo', '$precio', '$idPropietario')";
                if(!mysqli_query($con, $query)){
                    die('Error: ' . mysqli_error($con));
                    $error = "Error, no se pudo crear el registro";
                }else{
                    $mensaje = "Registro creado correctamente";
                    header('Location: ../vistas/vehiculos.php?mensaje='.urlencode($mensaje));
                    exit();
                }

            }else{
                $error = "No se encuentra la cedula $cedulaPropietario registrada en el sistema";
            }
        }
    }
?>