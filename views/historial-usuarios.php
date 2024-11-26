<?php include 'components/header.php';?>
<body>
    <div class="grid m-0">
        <div class="row height-100 m-0">
            <div class="col-lg-1 custom-col-1 menu">
                <div class="width-50">
                <ul class="grid-gap-2 d-flex flex-column justify-content-center align-items-center style-type-none m-0">
                    <li class="width-51 d-flex justify-content-center button-icon">
                        <a href="dashboard"><i class="bi bi-house-door icons-2"></i></a>
                    </li>
                    <li class="width-51 d-flex justify-content-center button-icon">
                    <i class="bi bi-person-plus icons-2"></i>
                    </li>
                    <li class="width-51 d-flex justify-content-center button-icon">
                    <i class="bi bi-journal-text icons-2"></i>
                    </li>
                </ul>
                </div>
                <div class="nav-item perfile dropdown">
                <a class="nav-link btn-user" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <span>SM</span>
                </a>
                <ul class="dropdown-menu menu-user">
                    <li><a class="dropdown-item" href="#">Vigilante nuevo</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item hover-primary"href="/parking/controllers/controller_logout.php">Salir</a></li>
                </ul>
                </div>
            </div>

            <!-- NAVEGACIÓN ENTRE TABLAS DE USUARIOS -->

            <div class="col-lg-9 custom-col-9 users-sec bg-gray">
                <div class="d-md-flex justify-content-md-between">
                        <h1>DUEÑOS</h1>
                        <button class="btn btn-warning btn-add text-light"  type="button" onclick="window.location.href='añadirDueño'"><i class="bi bi-plus"></i>Añadir Dueño</button>
                </div>

                <div class="container container-users d-flex justify-content-between">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link active nav-link-text" aria-current="page" href="#">Dueños</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-text" href="#">Vigilantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-text" href="#">Administradores</a>
                        </li>
                    </ul>
                    <div class="search-container">
                        <form class="searching">
                            <input class="searching" type="search" placeholder="Buscar...">
                        </form>
                    </div>
                </div>


                <div class="users-table">
                        <table class="table table-history table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>    
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="td">Mark</td>
                                    <td class="td">Otto</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="td">Mark</td>
                                    <td class="td">Otto</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="td">Mark</td>
                                    <td class="td">Otto</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="td">Mark</td>
                                    <td class="td">Otto</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="td">Mark</td>
                                    <td class="td">Otto</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                    <td class="td">@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td class="td">Jacob</td>
                                    <td class="td">Thornton</td>
                                    <td class="td">@fat</td>
                                    <td class="td">@fat</td>
                                    <td class="td">@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td class="td">Larry the Bird</td>
                                    <td class="td">Larry the Bird</td>
                                    <td class="td">@twitter</td>
                                    <td class="td">@twitter</td>
                                    <td class="td">@twitter</td>
                                </tr>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>