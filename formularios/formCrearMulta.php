<?php include "../php/crearMulta.php"?>
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
    <h1 style="margin-top: 1em;" class="text-center">BM AGENCIA SEGUROS</h1>
    <p class="text-center">Registra la multa</p>
    <div class="container">
      <div class="row">
        <h4>Crear un Nuevo Registro</h4>
      </div>   
      <div class="row caja">
        <?php if(isset($error)) : ?>
          <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
        <?php endif; ?>
        <div class="col-sm-6 offset-3">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha:</label>
              <input type="date" class="form-control" name="fecha" placeholder="Ingresa el fecha">                    
            </div>
            <div class="mb-3">
              <label for="hora" class="form-label">Hora:</label>
              <input type="time" class="form-control" name="hora" placeholder="Ingresa el hora">                    
            </div>
            <div class="mb-3">
              <label for="lugar" class="form-label">Lugar:</label>
              <input type="text" class="form-control" name="lugar" placeholder="Ingresa los lugar">                    
            </div>
            <div class="mb-3">
              <label for="importe" class="form-label">Importe:</label>
              <input type="number" class="form-control" name="importe" placeholder="Ingresa los importe">                    
            </div>
            <div class="mb-3">
              <label for="cedulaPropietario" class="form-label">Cedula:</label>
              <input type="text" class="form-control" name="cedulaPropietario" placeholder="Ingresa los cedula">                    
            </div>
            <div class="mb-3">
              <label for="placa" class="form-label">Placa:</label>
              <input type="text" class="form-control" name="placa" placeholder="Ingresa el placa">                    
            </div>
            <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>