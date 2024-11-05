<?php include '../config/conexion.php';?>
<?php
  //Crear y seleccionar query
  $queryAV ="SELECT a.Numero_de_Referencia, p.cedula, v.placa, a.Fecha, a.Lugar, a.Hora
            FROM accidentes a 
            JOIN participantes_en_accidentes pa
            ON a.Numero_de_Referencia = pa.idAccidente
            JOIN vehiculos v
            ON pa.idVehiculo = v.idVehiculo
            JOIN personas p  
            ON v.idPropietario = p.idPersonas";

  $resutl = mysqli_query($con,$queryAV);
  ?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/estilos.css" rel="stylesheet">
    <title>BM AGENCIA SEGUROS</title>
  </head>
  <body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="personas.php">Personas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vehiculos.php">Vehiculos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="accidentes.php">Accidentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="multas.php" aria-disabled="true">Multas</a>
        </li>
      </ul>
    </nav>
    <h1 class="text-center">BM AGENCIA SEGUROS</h1>
    <p class="text-center">Registra personas, vehículos, accidentes y multas con seguridad en BM AGENCIA SEGUROS</p>
    <div class="containerv">
      <?php if(isset($_GET['mensaje'])) : ?>                
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $_GET['mensaje']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-sm-4 offset-8">
          <a href="../formularios/formCrearAccidente.php" class="btn btn-success w-100"> Crear Nuevo Registro</a>
        </div>  
        <h2>Accidentes</h2>          
      </div>
      <div class="row caja">
        <div class="col-sm-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th># Referencia</th>
                <th>Cedula</th>
                <th>Placa</th><
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Hora</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while($fila = mysqli_fetch_assoc($resutl)) : ?>
              <tr>
                <td><?php echo $fila['Numero_de_Referencia']; ?></td>
                <td><?php echo $fila['cedula']; ?></td>
                <td><?php echo $fila['placa']; ?></td>
                <td><?php echo $fila['Fecha']; ?></td>
                <td><?php echo $fila['Lugar']; ?></td>
                <td><?php echo $fila['Hora']; ?></td>
                <td>
                  <a href="../formularios/formEditarAccidente.php?id=<?php echo $fila['Numero_de_Referencia']; ?>" class="btn btn-primary">Editar</a>
                </td>
              </tr> 
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>