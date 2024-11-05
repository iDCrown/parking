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

    //Seleccionar datos
    $query = "SELECT * FROM personas where idPersonas='".$idRegistro."'";
    $personas = mysqli_query($con, $query) or die (mysqli_error());

    //Volcamos los datos de ese registro en una fila
    $fila = mysqli_fetch_assoc($personas);



    if(isset($_POST['editarRegistro'])){
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
        if(!isset($cedula) || $cedula == '' ||!isset($nombre) || $nombre == '' || !isset($apellidos) || $apellidos == '' || !isset($direccion) || $direccion == '' ||!isset($barrio) || $barrio == '' ||!isset($telefono) || $telefono == '' || !isset($email) || $email == ''){
            $error = "Algunos campos están vacíos";
        }else{

            
            $query = "UPDATE personas set cedula = '$cedula', nombre='$nombre', apellidos='$apellidos', direccion = '$direccion', barrio = '$barrio', telefono='$telefono', email='$email' where idPersonas='$idRegistro'";

            if(!mysqli_query($con, $query)){
                die('Error: ' . mysqli_error($con));
                $error = "Error, no se pudo crear el registros";
            }else{
                $mensaje = "Registro editado correctamente";
                header('Location: ../vistas/personas.php?mensaje='.urlencode($mensaje));
                exit();
            }
        }

    }
    

?>