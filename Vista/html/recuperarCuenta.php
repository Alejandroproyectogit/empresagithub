
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>El Sabor</title>
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

<body id="body_estatico">
    <div class="container-fluid bg-white p-0">
    
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
                        <div class="nav-item dropdown">
                            <div class="dropdown-menu m-0">
                        </div>
                    </div>
                    <a href="index.php?" class="nav-item nav-link text-decoration-underline">Regresar al Inicio de Sesión</a>
                    </div>
                </div>
                    

                
            </nav>
            <div class="container-fluid py-5 bg-dark hero-header ">
                <div class="container py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <form action="index.php?accion=recuperar" method="post">
                                <h1 class="text-primary m-3 text-center">Recuperar Contraseña</h3>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" name="correo" class="form-control">
                                </div>
                                
                                <div class="text-center m-2">
                                <button class="btn btn-primary">Enviar correo</button>
                                </div>
                            </form>
                            
                            
                            <?php
                        if(isset($_SESSION['mensaje'])){
                            echo "<p id='error'>".$_SESSION['mensaje']."</p>";
                            unset($_SESSION['mensaje']);
                        }

                         ?>
                        </div>
                        
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="Vista/img/hero.png" alt="">
                        </div>
                    </div>
                </div>
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
