<?php include "../php/crearAccidentes.php"?>
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
    <p class="text-center">Registra el Accidente</p>
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
              <label for="placa" class="form-label">Placa del vehiculo:</label>
              <input type="text" class="form-control" name="placa" placeholder="Ingresa la placa del vehiculo">                    
            </div>
            <div class="mb-3">
              <label for="Fecha" class="form-label">Fecha:</label>
              <input type="date" class="form-control" name="Fecha" placeholder="Ingresa la Fecha">                    
            </div>
            <div class="mb-3">
              <label for="Lugar" class="form-label">Lugar:</label>
              <input type="text" class="form-control" name="Lugar" placeholder="Ingresa el Lugar">                    
            </div>
            <div class="mb-3">
              <label for="Hora" class="form-label">Hora:</label>
              <input type="time" class="form-control" name="Hora" placeholder="Ingresa la Hora">                    
            </div>
            <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>