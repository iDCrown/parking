<?php
    //Incluimos conexión
  include "../php/editarAccidentes.php";

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
    <p class="text-center">Edita los datos del accidente</p>
    <div class="container">
      <div class="row">
        <h4>Editar el accidente con # de referencia  <?php echo $fila['Numero_de_Referencia'] ; ?></h4>
      </div>
      <div class="row caja">
        <?php if(isset($error)) : ?>
          <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
        <?php endif; ?>
        <div class="col-sm-6 offset-3">
          <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
              <label for="placa" class="form-label">Placa del vehiculo:</label>
              <input type="text" class="form-control" name="placa" value="<?php echo $fila['placa']; ?>" placeholder="Ingresa la placa">                    
            </div> 
            <div class="mb-3">
              <label for="Fecha" class="form-label">Fecha:</label>
              <input type="date" class="form-control" name="Fecha" value="<?php echo $fila['Fecha']; ?>" placeholder="Edita la Fecha">                    
            </div>
            <div class="mb-3">
              <label for="Lugar" class="form-label">Lugar:</label>
              <input type="text" class="form-control" name="Lugar" value="<?php echo $fila['Lugar']; ?>" placeholder="Edita el Lugar">                    
            </div>
            <div class="mb-3">
              <label for="Hora" class="form-label">Hora:</label>
              <input type="time" class="form-control" name="Hora" value="<?php echo $fila['Hora']; ?>" placeholder="Edita la Hora">                    
            </div>
            <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>