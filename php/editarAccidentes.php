<?php
    //Incluimos conexión
  include '../config/conexion.php';
  

  //Obtener el id enviado de index
  $idReferencia = isset($_GET['id']) ? $_GET['id'] : null;
  if ($idReferencia === null) {
    // Manejar el caso donde idPersonas no está definido en la URL
    // Por ejemplo, redireccionar o mostrar un mensaje de error
    exit("Error: No se proporcionó el ID de la persona a editar.");
  }

  //Seleccionar datos
  $query = "SELECT a.Numero_de_Referencia, v.placa, a.Fecha, a.Lugar, a.Hora
    FROM accidentes a 
    JOIN participantes_en_accidentes pa
    ON a.Numero_de_Referencia = pa.idAccidente
    JOIN vehiculos v
    ON pa.idVehiculo = v.idVehiculo
    WHERE a.Numero_de_Referencia  = '$idReferencia' "; 

    $resultPA = mysqli_query($con, $query) or die (mysqli_error());

  //Volcamos los datos de ese registro en una fila
    $fila = mysqli_fetch_assoc($resultPA);


  if(isset($_POST['editarRegistro'])){
    $Fecha = mysqli_real_escape_string($con, $_POST['Fecha']);
    $Lugar = mysqli_real_escape_string($con, $_POST['Lugar']);
    $Hora = mysqli_real_escape_string($con, $_POST['Hora']);
    $placa = mysqli_real_escape_string($con, $_POST['placa']);

    //Configurar tiempo zona horaria
    date_default_timezone_set('America/Bogota');
    $time = date('h:i:s a', time());

    //Validar si no están vacíos
    if(empty($Fecha) || empty($Lugar) || empty($Hora) || empty($placa)){
      $error = "Algunos campos están vacíos";
    }else{
      $result = mysqli_query($con, "SELECT idVehiculo FROM vehiculos WHERE placa = '$placa'");
      if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $idVehiculo = $row['idVehiculo'];

        $querya = "UPDATE accidentes set Fecha='$Fecha', Lugar='$Lugar', Hora = '$Hora' WHERE Numero_de_Referencia='$idReferencia'";
        if(mysqli_query($con, $querya)){

          // participantes_en_accidentes
          $queryPA = "UPDATE participantes_en_accidentes set idVehiculo = '$idVehiculo' WHERE idAccidente='$idReferencia'";
          
          if(mysqli_query($con, $queryPA)){
            $mensaje = "Registro creado correctamente";
            header('Location: ../vistas/accidentes.php?mensaje='.urlencode($mensaje));
            exit();
          }else {
            die('Error al actualizar participantes_en_accidentes: ' . mysqli_error($con));
          }
        }else {
          die('Error al actualizar accidentes: ' . mysqli_error($con));
        }
      }else{
        $error = "No se encuentra la placa $placa registrada en el sistema";
      }
    }
  }
?>