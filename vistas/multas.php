<?php include '../config/conexion.php';?>
<?php
    //Crear y seleccionar query
    $query = "SELECT 
    m.Numero_de_Referencia, 
    m.Fecha, 
    m.Hora, 
    m.Lugar,
    m.Importe,  
    p.cedula, 
/*     p.nombre,
    p.apellidos, */
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
ORDER BY 
    m.Numero_de_Referencia DESC";
    $multas = mysqli_query($con, $query);

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
          <a class="nav-link "  href="multas.php" aria-disabled="true">Multas</a>
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
                <a href="../formularios/formCrearMulta.php" class="btn btn-success w-100">Crear Nuevo multa</a>
            </div>  
            <h2>Multas</h2>             
        </div>
        <div class="row caja">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th># Referencia</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Lugar</th>
                            <th>Importe</th>
                            <th>Responsable</th>
                            <th>Vehículo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($fila = mysqli_fetch_assoc($multas)) : ?>
                        <tr>
                            <td><?php echo $fila['Numero_de_Referencia']; ?></td>
                            <td><?php echo $fila['Fecha']; ?></td>
                            <td><?php echo $fila['Hora']; ?></td>
                            <td><?php echo $fila['Lugar']; ?></td>
                            <td><?php echo $fila['Importe']; ?></td>
                            <td><?php echo $fila['cedula']; ?></td>
                            <td><a href="vehiculos.php?placa=<?php echo $fila['placa']; ?>"><?php echo $fila['placa']; ?></a></td>
                            <td>
                            <a href="../formularios/formEditarMulta.php?id=<?php echo $fila['Numero_de_Referencia']; ?>" class="btn btn-primary"> Editar</a>
                            <a href="../formularios/formBorrarMulta.php?id=<?php echo $fila['Numero_de_Referencia']; ?>" class="btn btn-danger"> Borrar</a>
                            </td>
                        </tr> 

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

  </body>
</html>