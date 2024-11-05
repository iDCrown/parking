<?php include "../php/editarVehiculo.php"; ?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="../css/estilos.css" rel="stylesheet">

    <title>BM AGENCIA SEGUROS</title>
</head>
<body>
<h1  style="margin-top: 1em;" class="text-center">BM AGENCIA SEGUROS</h1>
<p class="text-center">Edita los datos del vehículo con placa <?php echo $fila['placa'] ; ?></p>

<div class="container">

    <div class="row">
        <h4>Edita a el vehículo de <?php echo $fila['nombre'] . " " . $fila['apellidos']; ?> </h4>
    </div>   



        <div class="row caja">

            <?php if(isset($error)) : ?>
                <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
            <?php endif; ?>

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa:</label>
                    <input type="text" class="form-control" name="placa" placeholder="Ingresa la Placa" value="<?php echo $fila['placa']; ?>">                    
                </div>
                
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" class="form-control" name="marca" placeholder="Ingresa la Marca" value="<?php echo $fila['marca']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" name="modelo" placeholder="Ingresa el Modelo" value="<?php echo $fila['modelo']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precio" placeholder="Ingresa el Precio" value="<?php echo $fila['precio']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="cedulaPropietario" class="form-label">Cedula propietario:</label>
                    <input type="number" class="form-control" name="cedulaPropietario" placeholder="Ingresa la Cedula propietario" value="<?php echo isset($fila['cedula']) ? $fila['cedula'] : ''; ?>">                    
                </div>
            
                <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>