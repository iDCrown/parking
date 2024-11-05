<?php
  //Incluimos conexión
  include '../config/conexion.php';
  

  if(isset($_POST['crearRegistro'])){
    $Fecha = mysqli_real_escape_string($con, $_POST['Fecha']);
    $Lugar = mysqli_real_escape_string($con, $_POST['Lugar']);
    $Hora = mysqli_real_escape_string($con, $_POST['Hora']);
    $placa = mysqli_real_escape_string($con, $_POST['placa']);


    $queryVehiculo = "SELECT idVehiculo, placa FROM vehiculos WHERE placa = '$placa'";
    $resultVehiculo = mysqli_query($con, $queryVehiculo);
    $vehiculo = mysqli_fetch_assoc($resultVehiculo);
    $idVehiculo = $vehiculo['idVehiculo'];

    //Configurar tiempo zona horaria
    date_default_timezone_set('America/Bogota');
    $time = date('h:i:s a', time());

    //Validar si no están vacíos
    if(empty($Fecha) || empty($Lugar) || empty($Hora) ||  empty($idVehiculo)){
      $error = "Algunos campos están vacíos";
    }else{
      $queryAccidente = "INSERT INTO accidentes(Fecha, Lugar, Hora) VALUES ('$Fecha', '$Lugar', '$Hora')";
      if((mysqli_query($con, $queryAccidente))){
        $idAccidente = mysqli_insert_id($con);

        // participantes_en_accidentes
        $queryPA = "INSERT INTO participantes_en_accidentes(idAccidente,  idVehiculo) VALUES ('$idAccidente', '$idVehiculo')";
        
        if(mysqli_query($con, $queryPA)){
          $mensaje = "Registro creado correctamente";
          header('Location: ../vistas/accidentes.php?mensaje='.urlencode($mensaje));
          exit();
        } else {
          die('Error: ' . mysqli_error($con));
        }
      }  
    }
  }
    

?>