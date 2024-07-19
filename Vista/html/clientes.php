<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="Vista/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Vista/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Vista/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Vista/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Vista/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Vista/css/style.css" rel="stylesheet">

    <!-- Incluir jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir jQuery UI desde CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- Incluir DATATABLES desde CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Enlaza el archivo CSS de Leaflet desde el CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i> El Sabor Tolimense</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php?accion=principal" class="nav-item nav-link">PRINCIPAL</a>
                        <a href="index.php?accion=trabajadores" class="nav-item nav-link">TRABAJADORES</a>
                        <a href="index.php?accion=clientes" class="nav-item nav-link active">CLIENTES</a>
                        <a href="index.php?accion=pedidos" class="nav-item nav-link">PEDIDOS</a>
                        <a href="index.php?accion=manual" class="nav-item nav-link">MANUAL</a>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">GESTION</a>
                            <div class="dropdown-menu m-0">
                                <a href="index.php?accion=productos" class="dropdown-item">PRODUCTOS</a>
                                <a href="index.php?accion=paginaProveedor" class="dropdown-item">PROVEEDORES</a>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?accion=destruirSesion" class="btn btn-primary py-2 px-4">CERRAR SESION</a>
                </div>
            </nav>
            <div class="container-fluid py-5 bg-dark hero-header">
            </div>
        </div>
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-7 text-center text-lg-start">
                            <form action="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="text-center text-primary">Gestión de Clientes</h1>
                                </div>
                                <div class="mb-5">
                                    <table id="Tabla_Clientes" class="table table-striped table-bordered" style="background: rgba(255, 255, 255, 0.9); color: #333;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Dirección</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($resultClientes) {
                                                foreach ($resultClientes as $cliente) {
                                                    echo "<tr>";
                                                    echo "<td>" . $cliente["cli_id"] . "</td>";
                                                    echo "<td>" . $cliente["cli_nombre"] . "</td>";
                                                    echo "<td>" . $cliente["cli_telefono"] . "</td>";
                                                    echo "<td>" . $cliente["cli_direccion"] . "</td>";
                                                    echo "<td>";
                                                    // Botón Editar
                                                    echo "<button type='button' class='btn btn-outline' data-bs-toggle='modal' data-bs-target='#modalEditarCliente' data-id='" . $cliente['cli_id'] . "' data-nombre='" . $cliente['cli_nombre'] . "' data-telefono='" . $cliente['cli_telefono'] . "' data-direccion='" . $cliente['cli_direccion'] . "'><i class='bi bi-brush'></i></button>";
                                                    // Botón Mapa
                                                    echo "<div class='btn btn-outline btn-sm btn-buscar' data-direccion='" . htmlspecialchars($cliente['cli_direccion']) . "'><i class='bi bi-geo-alt'></i></div>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>No hay clientes</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                        </div>
                        <div id="mapa" class="col-lg-5" style="height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miModalLabel">REGISTRAR CLIENTE NUEVO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="formularioCliente" title="Agregar Nuevo Cliente">
                            <form id="agregarCliente" action="index.php?accion=ingresarCliente" method="post">
                                <div class="mb-3">
                                    <label for="nombreCliente">Nombre:</label>
                                    <input type="text" class="form-control" id="CliNombre" name="CliNombre" placeholder="Nombre Completo" required>
                                    <label for="telefonoCliente">Telefono:</label>
                                    <input type="text" class="form-control" id="CliTelefono" name="CliTelefono" placeholder="Numero de Telefono" required>
                                    <label for="direccionCliente">Dirección:</label>
                                    <input type="text" class="form-control" id="CliDireccion" name="CliDireccion" placeholder="Ej (Cra. 5 #60-123 / 7 de Agosto)" required>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalEditarCliente" class="modal fade" tabindex="-1" aria-labelledby="modalEditarClienteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarClienteLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editarCliente" action="index.php?accion=editarCliente" method="post">
                            <div class="mb-3">
                                <label for="idCliente">Id</label>
                                <input type="text" class="form-control" id="id" name="id" readonly>
                                <label for="nombreCliente">Nombre:</label>
                                <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" required>
                                <label for="telefonoCliente">Telefono:</label>
                                <input type="text" class="form-control" id="nuevoTelefono" name="nuevoTelefono" required>
                                <label for="direccionCliente">Dirección:</label>
                                <input type="text" class="form-control" id="nuevoDireccion" name="nuevoDireccion" required>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" id="guardarCambios" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" data-bs-toggle="modal" data-bs-target="#miModal" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-person-plus"></i></button>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Vista/lib/wow/wow.min.js"></script>
    <script src="Vista/lib/easing/easing.min.js"></script>
    <script src="Vista/lib/waypoints/waypoints.min.js"></script>
    <script src="Vista/lib/counterup/counterup.min.js"></script>
    <script src="Vista/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Vista/lib/tempusdominus/js/moment.min.js"></script>
    <script src="Vista/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Vista/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Vista/js/scriptCliente.js"></script>
    <script src="Vista/js/main.js"></script>

    <!-- Template Javascript -->
</body>

</html>