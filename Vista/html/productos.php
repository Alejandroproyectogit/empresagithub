<!DOCTYPE html>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
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
                        <a href="index.php?accion=manual" class="nav-item nav-link">MANUAL</a>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">GESTION</a>
                            <div class="dropdown-menu m-0">
                                <a href="index.php?accion=productos" class="dropdown-item active">PRODUCTOS</a>
                                <a href="index.php?accion=paginaProveedor" class="dropdown-item">PROVEEDORES</a>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?accion=destruirSesion" class="btn btn-primary py-2 px-4">CERRAR SESION</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header">
            </div>
        </div>
                
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 text-center">
                    <div class="container text-center pt-5 pb-4">
                        <h1 class="display-3 text-primary mb-3 animated slideInDown">Entradas de Productos</h1>
                        <button type="button" id="btnagregarprod" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Newprod">
                            Nuevo Producto
                        </button>
                    </div>
                    <div class="mb-3 bg-light">
                        <!-- Tabla de pedidos -->
                        <table id="tabla_productos" class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Unidad de Medida</th>
                                    <th>Total disponible</th>
                                    <th>Total gastado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($producto)) {
                                    foreach ($producto as $productos) {
                                        echo "<tr>";
                                        echo "<td>" . $productos["prod_id"] . "</td>";
                                        echo "<td>" . $productos["prod_nombre"] . "</td>";
                                        echo "<td>" . $productos["prod_unidad_medida"] . "</td>";
                                        echo "<td>" . $productos["prod_total_entrada"] . "</td>";
                                        echo "<td>" . $productos["prod_total_salidas"] . "</td>";
                                        echo "<td>";
                                        echo "<button type='button' id='btneditarprod' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#updateprodModal" . $productos["prod_id"] . "' data-id='" . $productos["prod_id"] . "'><i class='bi bi-brush'></i></button>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo '<div class="modal fade" id="updateprodModal' . $productos['prod_id'] . '" tabindex="-1" aria-labelledby="updateModalLabel' . $productos['prod_id'] . '" aria-hidden="true">';
                                        echo '<div class="modal-dialog">';
                                        echo '<div class="modal-content">';
                                        echo '<div class="modal-header">';
                                        echo '<h5 class="modal-title" id="updateModalLabel' . $productos['prod_id'] . '">Actualizar Trabajador</h5>';
                                        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                        echo '</div>';
                                        echo '<div class="modal-body">';
                                        include('form_update_producto.php');
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';

                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No hay productos</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="index.php?accion=documentpdf"><button><img src="Vista/img/pdflogo.png" width="30" height="30"></button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Newprod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="agregarProductos" action="index.php?accion=ingresarProducto" method="post">
                            <div class="mb-3">
                                <label for="nombreprod">Nombre:</label>
                                <input type="text" class="form-control" id="ProdNombre" name="ProdNombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="unidmedida">Unidad de Medida:</label>
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="unidmedida" name="unidmedida">
                                    <option value="-1" selected="selected">-- Selecione la unidad de medida ---</option>
                                    <option value="Kilogramos">Kilogramos</option>
                                    <option value="Gramos">Gramos</option>
                                    <option value="Unidades">Unidades</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updateprodModal<?php echo $productos["prod_id"]; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?php echo $productos["prod_id"]; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel<?php echo $productos["prod_id"]; ?>">Actualizar Trabajador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php include('form_update_producto.php'); ?>
                </div>
            </div>
        </div>
    </div>
    

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="Vista/js/main.js"></script>
    <script src="Vista/js/productos.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla_productos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Todos"]
                ]
            });
        });
    </script>
</body>

</html>