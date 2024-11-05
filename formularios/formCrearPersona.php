<?php include "../php/crearPersona.php"?>
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
    <div class="content form">    
      <h1  style="margin-top: 1em;" class="text-center">BM AGENCIA SEGUROS</h1>
      <p class="text-center">Registra la persona</p>
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
                <label for="cedula" class="form-label">Cedula:</label>
                <input type="text" class="form-control" name="cedula" placeholder="Ingresa el cedula">                    
              </div>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre">                    
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos">                    
              </div>
              <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" name="direccion" placeholder="Ingresa los direccion">                    
              </div>
              <div class="mb-3">
                <label for="barrio" class="form-label">Barrio:</label>
                <input type="text" class="form-control" name="barrio" placeholder="Ingresa los barrio">                    
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" name="telefono" placeholder="Ingresa el teléfono">                    
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Ingresa el email">                    
              </div>
              <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>