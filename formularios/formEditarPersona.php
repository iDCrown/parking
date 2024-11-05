<?php
    //Incluimos conexión
    include "../php/editarPersona.php";

?>
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
    <p class="text-center">Edita los datos de la persona</p>

    <div class="container">
        <div class="row">
            <h4>Edita a <?php echo $fila['nombre'] . " " . $fila['apellidos']; ?></h4>
        </div>
        <div class="row caja">

            <?php if(isset($error)) : ?>
                <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
            <?php endif; ?>

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cedula:</label>
                    <input type="text" class="form-control" name="cedula" placeholder="Ingresa la cedula" value="<?php echo $fila['cedula']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $fila['nombre']; ?>">                    
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos" value="<?php echo $fila['apellidos']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Ingresa el Direccion" value="<?php echo $fila['direccion']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="barrio" class="form-label">Barrio:</label>
                    <input type="text" class="form-control" name="barrio" placeholder="Ingresa el Barrio" value="<?php echo $fila['barrio']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono" value="<?php echo $fila['telefono']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa el email" value="<?php echo $fila['email']; ?>">                    
                </div>
            
                <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>