<?php
    //Incluimos conexión
    include "../php/editarMulta.php";

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
    <p class="text-center">Editar la multa</p>

    <div class="container">
        <div class="row">
            <h4>Edita la Multa con Numero de referencia #  <?php echo $fila['Numero_de_Referencia'] ; ?></h4>
        </div>
        <div class="row caja">

            <?php if(isset($error)) : ?>
                <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
            <?php endif; ?>

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" placeholder="Ingresa la fecha" value="<?php echo $fila['fecha']; ?>">                    
                </div>
                
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora:</label>
                    <input type="time" class="form-control" name="hora" placeholder="Ingresa la hora" value="<?php echo $fila['hora']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" name="lugar" placeholder="Ingresa el lugar" value="<?php echo $fila['lugar']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="importe" class="form-label">Importe:</label>
                    <input type="number" class="form-control" name="importe" placeholder="Ingresa el importe" value="<?php echo $fila['importe']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="cedulaPropietario" class="form-label">Cedula del responsable:</label>
                    <input type="text" class="form-control" name="cedulaPropietario" placeholder="Ingresa la cedula" value="<?php echo $fila['cedula']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="placa" class="form-label">Placa del vehículo:</label>
                    <input type="text" class="form-control" name="placa" placeholder="Ingresa la placa" value="<?php echo $fila['placa']; ?>">                    
                </div>
            
                <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>