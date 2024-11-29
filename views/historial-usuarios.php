<?php include 'components/header.php'; ?>

<body>
  <div class="grid m-0">
    <div class="row height-100 m-0">
      <?php include 'components/menu.php'; ?>

      <!-- NAVEGACIÓN ENTRE TABLAS DE USUARIOS -->

      <div class="col-lg-9 custom-col-9 users-sec bg-gray">
        <div class="d-md-flex justify-content-md-between">
          <h1>Usuarios en el sistema</h1>
          <button id="buttonAdd" class="btn btn-warning btn-add text-light" style="display: block;" type="button"
              onclick="window.location.href='añadirDueño'">
              <i class="bi bi-plus"></i>Añadir Dueño
            </button>
          <button id="buttonAddV" class="btn btn-warning btn-add text-light" style="display: none;" type="button"
            onclick="window.location.href='añadirVigilante'">
            <i class="bi bi-plus"></i>Añadir Vigilante
          </button>
        </div>
        <div class="container container-users d-flex justify-content-between">
          <ul class="nav nav-underline">
            <li class="nav-item">
              <a  id="tab1" class="tab active-tab nav-link nav-link-text" onclick="selectTab('dueno')" aria-current="page" >Dueños</a>
            </li>
            <li class="nav-item">
              <a id="tab2" class="tab nav-link nav-link-text" onclick="selectTab('vigilante')" >Vigilantes</a>
            </li>
            <li class="nav-item">
              <a id="tab3" class="tab nav-link nav-link-text" onclick="selectTab('administrador')" >Administradores</a>
            </li>
          </ul>
          <form class="nosubmit">
            <input id="buscador"  class="nosubmit" type="search" placeholder="Buscar...">
          </form>
        </div>
        <div class="users-table">
          <table  class="table table-history table-hover">
            <thead id="tabla-head">
            <!-- muestra las columnas especificas -->
            </thead>
            <tbody id="tabla-body">
            <!-- tabla que renderiza javascript -->
            </tbody>
          </table>
        </div>
        <div  class=" d-flex justify-content-center">
          <div id="loader" class=" mt-5 mb-5 spinner-border text-warning " role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <!-- <div class="container container-pagination">
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
        </div> -->
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/historial-usuario.js" defer></script>
  <script src="js/buscador.js" defer></script>
</body>
</html>