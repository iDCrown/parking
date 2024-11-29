<?php include 'components/header.php'; ?>
<body>
  <div class="grid m-0">
    <div class="row height-100 m-0">
	    <?php include 'components/menu.php'; ?>
      <div class="col-lg-9 custom-col-9 bg-gray">
        <div class="history">
          <h1>Historial de Entradas y Salidas</h1>

          <!-- Buscador -->
          <div class="container-filter">
            <form class="nosubmit">
            <input id="buscador" class="nosubmit" type="search" placeholder="Buscar...">
            </form>
          </div>
         
          <table class="table-history table table-hover">
            <thead>
              <tr>
                <th scope="col">N. Espacio</th>
                <th scope="col">Vehiculo</th>
                <th scope="col">Placa</th> 
                <th scope="col">Cedula</th>
                <th scope="col">Nombre del Dueño</th>
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($historial as $registro):?> 
                <tr class="item">
                  <td><?= htmlspecialchars($registro['numero_espacio']); ?></td>
                  <td><?= htmlspecialchars($registro['tipo_espacio']); ?></td>
                  <td><?= htmlspecialchars($registro['placa']); ?></td>
                  <td><?= htmlspecialchars($registro['cedula']); ?></td>
                  <td><?= htmlspecialchars($registro['nombre'] . ' ' . $registro['apellido']); ?></td>
                  <td><?= htmlspecialchars($registro['horaEntrada']); ?></td>
                  <td><?= htmlspecialchars($registro['horaSalida']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/buscador.js" defer></script>
</body>
</html>