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
                                <a href="index.php?accion=entradas" class="dropdown-item active">ENTRADAS</a>
                                <a href="index.php?accion=gestion" class="dropdown-item">GESTION</a>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?accion=login" class="btn btn-primary py-2 px-4">CERRAR SESION</a>
                </div>
            </nav>

            <div class="container-fluid py-5 bg-dark hero-header">
                <div class="container text-center pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Entradas de Productos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item text-white active" aria-current="page">Entradas</li>
                            <li class="breadcrumb-item"><a href="gestion.html">Gestion</a></li>
                        </ol>
                    </nav>
                </div>
                <input type="" placeholder="Buscar producto">
                <a><button class="btn btn-success">Buscar</button></a>
                <a><button class="btn btn-success">Nuevo</button></a>
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha de ingreso</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col" colspan="2">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        <tr>
                            <td scope="row">2</td>
                            <td>Palos de pincho</td>
                            <td>3</td>
                            <td>27/01/2024</td>
                            <td>pepito</td>
                            <td><button class="btn btn-outline-success">Editar</button></td>
                            <td><button class="btn btn-outline-success">Eliminar</button></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Palos de pincho</td>
                            <td>3</td>
                            <td>27/01/2024</td>
                            <td>pepito</td>
                            <td><button class="btn btn-outline-success">Editar</button></td>
                            <td><button class="btn btn-outline-success">Eliminar</button></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Palos de pincho</td>
                            <td>3</td>
                            <td>27/01/2024</td>
                            <td>pepito</td>
                            <td><button class="btn btn-outline-success">Editar</button></td>
                            <td><button class="btn btn-outline-success">Eliminar</button></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Palos de pincho</td>
                            <td>3</td>
                            <td>27/01/2024</td>
                            <td>pepito</td>
                            <td><button class="btn btn-outline-success">Editar</button></td>
                            <td><button class="btn btn-outline-success">Eliminar</button></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Palos de pincho</td>
                            <td>3</td>
                            <td>27/01/2024</td>
                            <td>pepito</td>
                            <td><button class="btn btn-outline-success">Editar</button></td>
                            <td><button class="btn btn-outline-success">Eliminar</button></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Palos de pincho</td>
                            <td>3</td>
                            <td>27/01/2024</td>
                            <td>pepito</td>
                            <td><button class="btn btn-outline-success">Editar</button></td>
                            <td><button class="btn btn-outline-success">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
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