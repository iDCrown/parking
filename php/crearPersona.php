<?php
    //Incluimos conexión
    include '../config/conexion.php';

    if(isset($_POST['crearRegistro'])){
        $cedula = mysqli_real_escape_string($con, $_POST['cedula']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $apellidos = mysqli_real_escape_string($con, $_POST['apellidos']);
        $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
        $barrio = mysqli_real_escape_string($con, $_POST['barrio']);
        $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
        $email = mysqli_real_escape_string($con, $_POST['email']);

        //Configurar tiempo zona horaria
        date_default_timezone_set('America/Bogota');
        $time = date('h:i:s a', time());

        //Validar si no están vacíos
        if(!isset($cedula) || $cedula == '' || !isset($nombre) || $nombre == '' || !isset($apellidos) || $apellidos == '' || !isset($telefono) || $telefono == '' || !isset($direccion) || $direccion == '' || !isset($barrio) || $barrio == ''|| !isset($email) || $email == ''){
            $error = "Algunos campos están vacíos";
        }else{
            $query = "INSERT INTO personas(cedula, nombre, apellidos, direccion, barrio, telefono, email)VALUES('$cedula', '$nombre', '$apellidos', '$direccion', '$barrio', '$telefono', '$email')";
            if(!mysqli_query($con, $query)){
                die('Error: ' . mysqli_error($con));
                $error = "Error, no se pudo crear el registro";
            }else{
                $mensaje = "Registro creado correctamente";
                header('Location: ../vistas/personas.php?mensaje='.urlencode($mensaje));
                exit();
            }
        }

    }
    

?>