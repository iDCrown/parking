<?php include 'components/header.php';?>
<body>
    <div class="container-fluid m-0">
        <div class="row align-items-center width-100">
            <div class="col-6 bg-warning height-100">
            </div>
            <div class="col-6 bg-white height-100">
            </div>
            <div class="position-absolute d-flex login">
                <div class="container position-absolute login_div d-flex flex-column align-items-center justify-content-center" style="width: 47em; padding-left:0; height:87vh">
                    <div>

                    <h1>Dueño de Vehiculo</h1>
                    </div>
                    <form method="post" action="controllers/registroDuenoController.php" class="d-flex flex-column align-items-center">        
                    <section class="d-flex">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="padding-left: 40px; font-size: 20px;">Nombres</label>
                            <input name="nombre" type="text" class="input-form inputOwn" id="nombre" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="padding-left: 40px; font-size: 20px;">Apellidos</label>
                            <input name="apellido" type="text" class="input-form inputOwn" id="apellido">
                        </div>
                    </section>
                    <article>
                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="padding-left: 14px; font-size:20px;">Cedula</label>
                            <input name="cedula" type="text" class="input-form input-car" id="cedula" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                        <label for="rol_dueno" class="form-label" style="padding-left: 14px; font-size:20px;">Tipo de cliente</label>
                            <select name="rol_dueno" id="rol_dueno" class="form-select input-form input-car" required>
                                <option value="">Seleccione</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Maestro">Maestro</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Visitante">Visitante</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="padding-left: 14px; font-size:20px;">Placa del vehículo</label>
                            <input name="placa" type="text" class="input-form input-car" id="placa" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                        <label for="tipo_vehiculo" class="form-label" style="padding-left: 14px; font-size:20px;">Tipo del vehículo</label>
                            <select name="tipo_vehiculo" id="tipo_vehiculo" class="form-select input-form input-car" required>
                                <option value="">Seleccione</option>
                                <option value="Auto">Auto</option>
                                <option value="Moto">Moto</option>
                            </select>
                        </div>
                    </article>
<!--                     <button name="btnRegistroOwn" value="btnRegistroOwn" type="submit" class="btn-own mb-3">Registrar</button>-->                   
                      <button style="margin-top: 25px;" name="btnRegistroOwn" value="btnRegistroOwn" type="submit" class="btn summit btn-warning btn-md">Registrar</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>