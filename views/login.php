<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" href="./assets/css/estilos.css">
</head>
<body>

<!--LOGIN-->
<div class="container-fluid m-0">
  <div class="row align-items-center width-100 ">
    <div class="col-6 bg-warning height-100">
    </div>
    <div class="col-6 bg-white height-100">
    </div>
    <div class="position-absolute d-flex login">
      <div class="container position-absolute login_div d-flex align-items-center justify-content-between">

<!--FORMULARIO-->
      <div class="col-lg-4 d-flex flex-column align-items-center " style="width: auto;">
        <h2>LOG IN</h2>
        <?php
          require_once __DIR__ . '/../db/db.php';
          require_once __DIR__ . '/../controllers/controller_login.php';
        ?>
        <form method="post" action="" class="d-flex flex-column align-items-center">        
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input name="usuario" type="text" class="input-login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"></label>
            <input name="password" type="password" class="input-login mb-3" id="exampleInputPassword1" placeholder="Contraseña">
          </div>
  <!--         <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button name="btnIngreso" value="btnIngreso" type="submit" class="btn-login mb-3">Log in</button>
          <!-- <div id="emailHelp" class="form-text">¿Contraseña olvidada?</div> -->
        </form>
      </div>
<!--IMAGEN REPRESENTATIVA-->
        <div class="col-lg-6 bg-warning h-login">
          <figure class="container-img">
            <img src="./assets/images/ImagenParking.png" alt="Imagen Parqueadero">
          </figure>
        </div>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
