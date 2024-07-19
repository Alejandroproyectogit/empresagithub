Vista<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="Vista/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

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
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>El Sabor Tolimense</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php?accion=principal" class="nav-item nav-link">PRINCIPAL</a>
                        <a href="index.php?accion=trabajadores" class="nav-item nav-link">TRABAJADORES</a>
                        <a href="index.php?accion=clientes" class="nav-item nav-link">CLIENTES</a>
                        <a href="index.php?accion=pedidos" class="nav-item nav-link">PEDIDOS</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">INVENTARIO</a>
                            <div class="dropdown-menu m-0">
                                <a href="index.php?accion=entradas" class="dropdown-item">ENTRADAS</a>
                                <a href="index.php?accion=gestion" class="dropdown-item active">GESTION</a>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?accion=login" class="btn btn-primary py-2 px-4">CERRAR SESION</a>
                </div>
            </nav>

            <div class="container-fluid py-5 bg-dark hero-header">
                <div class="container text-center pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">GESTION INVENTARIO</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Entradas</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">GESTION</li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <table class="table table-bordered table-light  text-center">
                                    <thead class="table-dark">
                                        <th>N.Prod</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Maiz</td>
                                            <td>15</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary mt-3" id="btnMostrarFormulario">Agregar</button>

                                <!-- Formulario oculto -->
                                <form id="formularioAgregar" style="display: none;">
                                    <div class="mb-3">
                                        <label for="numeroProducto">N.Prod:</label>
                                        <input type="text" class="form-control" id="numeroProducto" name="numeroProducto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcionProducto">Descripcion:</label>
                                        <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cantidadProducto">Cantidad:</label>
                                        <input type="text" class="form-control" id="cantidadProducto" name="cantidadProducto" required>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="btnGuardarProducto">Guardar</button>
                                </form>
                            </div>
                            <div class="col-6 align-items-center">
                                <img class="img-fluid img-2" src="Vista/img/Grafica-de-Comportamiento-del-Inventario.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <!-- Template Javascript -->
    <script src="Vista/js/main.js"></script>
</body>

</html>