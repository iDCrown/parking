<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/custom.css">
  <link rel="stylesheet" href="./css/estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&family=DM+Serif+Display:ital@0;1&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Libre+Caslon+Display&family=Lora:ital,wght@0,400..700;1,400..700&family=Ribeye&display=swap" rel="stylesheet">
</head>
<body>
<div class="grid m-0">
  <div class="row height-100 m-0">
    <div class="col-lg-1 custom-col-1">
      <ul class="grid-gap-2 d-flex flex-column justify-content-center align-items-center style-type-none m-0 height-100">
        <li class="width-51 d-flex justify-content-center button-icon">
          <i class="bi bi-house-door icons-2"></i>
        </li>
        <li class="width-51 d-flex justify-content-center button-icon">
          <i class="bi bi-person-plus icons-2"></i>
        </li>
        <li class="width-51 d-flex justify-content-center button-icon">
          <i class="bi bi-journal-text icons-2"></i>
        </li>
      </ul>
    </div>
    <div class="col-lg-9 custom-col-9 bg-gray">
      <div class="container-info">
        <h1>Dashboard</h1>
        <div class="alert alert-success" role="alert">
          <figure class="img-welcome">
            <img class="img" src="./img/welcome.png" alt="">
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
          <div class="container-filter">
            <form class="nosubmit">
              <input class="nosubmit" type="search" placeholder="Buscar...">
            </form>
            <button class="btn btn-warning btn-sm dropdown-toggle button-filter" type="button" data-bs-toggle="dropdown" aria-expanded="false">Filtrar</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
          </div>
          <div class="table-content">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="panel position-absolute bottom-0 end-0 bg-second">
      <h2 class="title-panel"> Ingresos y Salidas</h2>
      <div class="card-form width-card">
          <div class="card-header-form color">
            <span>Noviembre 10, 10:05pm</span>
            <div>
              <i class="bi bi-bicycle i-movil"></i>
              <i class="bi bi-car-front i-movil"></i>
            </div>
          </div>
          <form class="form-access" action="">
            <h5>Ingresa la placa del vehiculo</h5>
            <input class="nosubmit " type="search" placeholder="Buscar...">
            <button class="btn summit btn-warning btn-md">Registrar</button>
          </form>
        </div>
      <div>
      <div class="card-form width-card">
          <div class="card-header-form color">
            <span>Noviembre 10, 1:05pm</span>
            <div>
              <i class="bi bi-bicycle i-movil select"></i>
              <i class="bi bi-car-front i-movil select"></i>
            </div>
          </div>
          <form class="form-access" action="">
            <h5>Salida del vehiculo</h5>
            <input class="nosubmit" type="search" placeholder="Buscar...">
            <button class="btn summit btn-warning btn-md">Registrar</button>
          </form>
        </div>
      <div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>