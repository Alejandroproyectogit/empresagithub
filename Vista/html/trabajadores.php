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
</head>

<body>
    <div class="container-xxl bg-white p-0">
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
                        <a href="index.php?accion=trabajadores" class="nav-item nav-link active">TRABAJADORES</a>
                        <a href="index.php?accion=clientes" class="nav-item nav-link">CLIENTES</a>
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

            <div class="container-xxl py-5 bg-dark hero-header">
                <div class="container text-center pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">PERSONAS</h1>
                    <button type="button" id="btnagregar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar Personal
                    </button>
                    <div>
                        <select class="form-select position-absolute start-50 translate-middle" aria-label="Default select example" id="filtro-usuarios">
                            <option value="1" <?php echo ($filtro == 1) ? 'selected' : ''; ?>>Activos</option>
                            <option value="2" <?php echo ($filtro == 2) ? 'selected' : ''; ?>>Retirados</option>
                            <option value="3" <?php echo ($filtro == 3) ? 'selected' : ''; ?>>Suspendidos</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">MIEMBROS DE LA FABRICA</h5>
                    <h1 id="texto-traba" class="mb-5">ADMINISTRADORES</h1>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Empleado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="agregarPersonal" action="index.php?accion=ingresarPersonal" method="post">
                                        <div class="mb-3">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" id="PerNombre" name="PerNombre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo">Correo:</label>
                                            <input type="email" class="form-control" id="PerCorreo" name="PerCorreo" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono">Telefono:</label>
                                            <input type="number" class="form-control" id="PerTelefono" name="PerTelefono" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="usuario">Usuario:</label>
                                            <input type="text" class="form-control" id="PerUsuario" name="PerUsuario" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password">Contraseña:</label>
                                            <input type="password" class="form-control" id="Percontra" name="Percontra" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cargo">Cargo:</label>
                                            <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="Percargo" name="Percargo">
                                                <option value="-1" selected="selected">--Selecione el cargo ---</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Empleado</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Estado">Estado:</label>
                                            <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="PerEstado" name="PerEstado">
                                                <option value="1">Activo</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>


                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Administradores -->
                <div class="row g-4">
                    <?php  if(!empty($administradores)): ?>
                        <?php foreach ($administradores as $usuario) : ?>
                            <?php if ($usuario["usu_id_cargo"] == 1) : ?>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item text-center rounded overflow-hidden">
                                        <div class="rounded-circle overflow-hidden m-4"></div>
                                        <h5 class="mb-0"><?php echo $usuario["usu_nombres"]; ?></h5>
                                        <small>ADMINISTRADOR</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $usuario["usu_id"]; ?>"><i class="bi bi-pencil-fill"></i></button>
                                            <a class="btn btn-square btn-primary mx-1 whatsapp-btn" href="#" data-whatsapp="<?php echo $usuario["usu_telefono"]; ?>"><i class="bi bi-whatsapp"></i></a>
                                            <a class="btn btn-square btn-primary mx-1 email-btn" href="#" data-email="<?php echo $usuario["usu_correo"]; ?>"><i class="bi bi-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="updateModal<?php echo $usuario["usu_id"]; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?php echo $usuario["usu_id"]; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel<?php echo $usuario["usu_id"]; ?>">Actualizar Trabajador</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php include('formulario_actualizacion.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php else : ?>
                        <div class="col-lg-12 text-center">
                            <h5>No hay información</h5>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <div class="col-lg-12 text-center">
                            <h5>No hay información</h5>
                        </div>
                        <?php endif; ?>
                </div>

                <!-- Empleados -->
                <div class="container-xxl pt-5 pb-3">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">MIEMBROS DE LA FABRICA</h5>
                            <h1 id="texto-traba" class="mb-5">TRABAJADORES</h1>
                            <div class="row g-4">
                    <?php  if(!empty($empleados)): ?>
                        <?php foreach ($empleados as $usuario) : ?>
                            <?php if ($usuario["usu_id_cargo"] == 2) : ?>
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item text-center rounded overflow-hidden">
                                        <div class="rounded-circle overflow-hidden m-4"></div>
                                        <h5 class="mb-0"><?php echo $usuario["usu_nombres"]; ?></h5>
                                        <small>TRABAJADOR</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $usuario["usu_id"]; ?>"><i class="bi bi-pencil-fill"></i></button>
                                            <a class="btn btn-square btn-primary mx-1 whatsapp-btn" href="#" data-whatsapp="<?php echo $usuario["usu_telefono"]; ?>"><i class="bi bi-whatsapp"></i></a>
                                            <a class="btn btn-square btn-primary mx-1 email-btn" href="#" data-email="<?php echo $usuario["usu_correo"]; ?>"><i class="bi bi-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="updateModal<?php echo $usuario["usu_id"]; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?php echo $usuario["usu_id"]; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel<?php echo $usuario["usu_id"]; ?>">Actualizar Trabajador</h5>
                                                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php include('formulario_actualizacion.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php else : ?>
                        <div class="col-lg-12 text-center">
                            <h5>No hay información</h5>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <div class="col-lg-12 text-center">
                            <h5>No hay información</h5>
                        </div>
                        <?php endif; ?>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- trabajadores.php -->

    <!-- Modal para mostrar el teléfono -->
    <div class="modal fade" id="phoneModal" tabindex="-1" aria-labelledby="phoneModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="phoneModalLabel">Teléfono</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="phoneContent"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar el correo electrónico -->
    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Correo Electrónico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="emailContent"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tu código HTML existente -->


    <!-- Team End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script>
        document.getElementById('filtro-usuarios').addEventListener('change', function() {
            var filtro = this.value;
            window.location.href = 'index.php?accion=trabajadores&filtro=' + filtro;
        });
    </script>
    
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



    <!-- Template Javascript -->
    <script src="Vista/js/main.js"></script>
    <script src="Vista/js/trabajadores.js"></script>
</body>

</html>