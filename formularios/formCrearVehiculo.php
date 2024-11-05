<?php include "../php/crearVehiculo.php"?>
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
    <h1  style="margin-top: 1em;" class="text-center">BM AGENCIA SEGUROS</h1>
    <p class="text-center">Registra el vehículo junto a su propietario</p>
    <div class="container">
      <div class="row">
        <h4>Vehículos</h4>
      </div>   
      <div class="row caja">
        <?php if(isset($error)) : ?>
          <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
        <?php endif; ?>
        <div class="col-sm-6 offset-3">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
              <label for="placa" class="form-label">Placa:</label>
              <input type="text" class="form-control" name="placa" id="placa" required placeholder="Ingresa el Placa">                    
            </div>
            <div class="mb-3">
              <label for="marca" class="form-label">Marca:</label>
              <input type="text" class="form-control" name="marca" id="marca" required placeholder="Ingresa el Marca">                    
            </div>
            <div class="mb-3">
              <label for="modelo" class="form-label">Modelo:</label>
              <input type="text" class="form-control" name="modelo" id="modelo" required placeholder="Ingresa el Modelo">                    
            </div>
            <div class="mb-3">
              <label for="precio" class="form-label">Precio:</label>
              <input type="number" class="form-control" name="precio"  id="precio" required placeholder="Ingresa los Precio">                    
            </div>
            <div class="mb-3">
              <label for="cedulaPropietario" class="form-label">Cedula del propietario:</label>
              <input type="number" class="form-control" name="cedulaPropietario" id="cedulaPropietario" required placeholder="Ingresa la cedula del propietario">                    
            </div>
            <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>