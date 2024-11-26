<?php include 'components/header.php'; ?>

<body>
  <div class="grid m-0">
    <div class="row height-100 m-0">
      <?php include 'components/menu.php'; ?>

      <!-- NAVEGACIÓN ENTRE TABLAS DE USUARIOS -->

      <div class="col-lg-9 custom-col-9 users-sec bg-gray">
        <div class="d-md-flex justify-content-md-between">
          <h1>DUEÑOS</h1>
          <button class="btn btn-warning btn-add text-light" type="button"
            onclick="window.location.href='añadirDueño'"><i class="bi bi-plus"></i>Añadir Dueño</button>
        </div>
        <div class="container container-users d-flex justify-content-between">
          <ul class="nav nav-underline">
            <li class="nav-item">
              <a class="nav-link active nav-link-text" onclick="selectTab('dueno')" aria-current="page" >Dueños</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-text" onclick="selectTab('vigilante')" >Vigilantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-text" onclick="selectTab('administradores')" >Administradores</a>
            </li>
          </ul>
          <form class="nosubmit">
            <input class="nosubmit" type="search" placeholder="Buscar...">
          </form>
        </div>
        <div id="mensajeResultado"></div>

        <div class="users-table">

          <table id="tabla-body" class="table table-history table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Rol</th>
              </tr>
            </thead>

            <tbody>
            <?php if (!empty($registros)): ?>
              <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?= htmlspecialchars($registro['nombre_usuario'] ?? $registro['nombre_dueno']); ?></td>
                    <td><?= htmlspecialchars($registro['apellido_usuario'] ?? $registro['apellido_dueno']); ?></td>
                    <td><?= htmlspecialchars($registro['cedula_usuario'] ?? $registro['cedula_dueno']); ?></td>
                    <td><?= htmlspecialchars($registro['correo'] ?? 'N/A'); ?></td>
                    <td><?= htmlspecialchars($registro['rol'] ?? 'N/A'); ?></td>
                </tr>
              <?php endforeach; ?>
              <?php else: ?>
            <?php endif; ?>

            </tbody>
          </table>


        </div>
        <div class="container container-pagination">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item active"><a class="page-link bg-warning" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/historial-usuario.js"></script>
</body>
</html>