
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-dark" data-bs-theme="dark">
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">INICIO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="./vistas/personas.php">Personas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./vistas/vehiculos.php">Vehiculos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./vistas/accidentes.php">Accidentes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "  href="./vistas/multas.php" aria-disabled="true">Multas</a>
    </li>
  </ul>
</nav>
<!-- carrousel -->


<div id="carouselExample" style="display: flex; align-items: center; justify-content: center;" class="carousel slide">
<h1 style="
    color: aliceblue;
    position: absolute;
    font-family: monospace;
    z-index: 2;
    font-size: revert-layer;
    font-weight: 800;
">AGENCIA DE SEGUROS</h1>
  <div class="carousel-inner">
    <span style="position: absolute; width: 100vw; height: 94vh; background: #21476ea1; z-index: 1;">.</span>
    <div class="carousel-item active" >
      <img src="./css/general-de-seguros-agentes.png" style="height: 94vh; object-fit: cover;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./css/15430784513964.jpg"  style="height: 94vh; object-fit: cover;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./css/banner-4.jpg" style="height: 94vh; object-fit: cover;" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>