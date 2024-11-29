  <?php
  session_start();
  if (empty($_SESSION["id_usuario"])) {
    header("location: login");
  }
  ?>
  <?php include 'components/header.php'; ?>
  <div class="grid m-0">
    <div class="row height-100 m-0">
      <?php include 'components/menu.php'; ?>
      <div class="col-lg-9 custom-col-9 bg-gray">
        <div class="container-info">
          <h1>Dashboard</h1>

          <div class="alert alert-success" role="alert">
            <figure class="img-welcome">
              <img class="img" src="./assets/images/welcome.png" alt="Bienvenidos">
            </figure>
            <h4 class="alert-heading">Bienvenido!!</h4>
          </div>
          <div class="cards-dashboard">
            <div class="card content width-card text-bg-warning mb-3" style="max-width: 18rem;">
              <div class="card-header">Asignado <i class=" i-movil"></i></div>
              <div class="card-body">
                <h5 class="card-title coolor">10</h5>
              </div>
            </div>
            <div class="card content width-card mb-3" style="max-width: 18rem;">
              <div class="card-header color">Espacios disponibles <i class="bi bi-car-front i-movil"></i></div>
              <div class="card-body">
                <h5 class="card-title color">04</h5>
              </div>
            </div>
            <div class="card content width-card mb-3" style="max-width: 18rem;">
              <div class="card-header color">Espacios disponibles <i class="bi bi-bicycle i-movil"></i></div>
              <div class="card-body">
                <h5 class="card-title color">05</h5>
              </div>
            </div>
          </div>
          <div class="table-visit">
            <!-- Buscador -->
            <div class="container-filter">
              <form class="nosubmit">
                <input id="buscador" class="nosubmit" type="search" placeholder="Buscar...">
              </form>
            </div>

            <div class="table-content">
              <table style="text-align: center;" class=" table table-light table-hover">
                <thead>
                  <tr>
                    <th scope="col">N. Espacio</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Nombre del Dueño</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Entrada</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- tabla javascript -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="mensajeResultado" class="alerta"></div>
      <div class="panel position-absolute bottom-0 end-0 bg-second">
        <h2 class="title-panel"> Ingresos y Salidas</h2>
        <div>
        </div>
        <div class="card-form width-card">

          <div class="card-header-form color">
            <span>Noviembre 10, 10:05pm</span>
            <div>
              <button onclick="seleccionarTipo('Moto')" class="icon-btn">
                <i class="bi bi-bicycle i-btn"></i>
              </button>
              <button onclick="seleccionarTipo('Auto')" class="icon-btn">
                <i class="bi bi-car-front i-btn"></i>
              </button>
            </div>
          </div>
          <form class="form-access first" id="formRegistro" onsubmit="registrarVehiculo(event)">
            <h5>Ingresa la placa del vehiculo</h5>
            <input id="inputPlaca" class="nosubmit " type="search" placeholder="Placa...">
            <input id="inputCedula" class="nosubmit " type="search" placeholder="Cedula...">
            <button class="btn summit btn-warning btn-md">Registrar</button>
          </form>
        </div>
        <div>

          <div class="card-form width-card">
            <div class="card-header-form color">
              <form action="">
                <input type="date">
              </form>
              <div>
                <button onclick="seleccionarTipoS('Moto')" class="icon-btn">
                  <i class="bi bi-bicycle i-btn"></i>
                </button>
                <button onclick="seleccionarTipoS('Auto')" class="icon-btn">
                  <i class="bi bi-car-front i-btn"></i>
                </button>
              </div>
            </div>
            <form class="form-access" id="formSalida" onsubmit="registrarSalida(event)">
              <h5>Salida del vehiculo</h5>
              <input id="inputPlacaSalida" class="nosubmit" type="search" placeholder="Placa...">
              <button class="btn summit btn-warning btn-md">Registrar</button>
            </form>
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/registroEntrada.js"></script>
  <script src="js/buscador.js" defer></script>
  </body>

  </html>

 

