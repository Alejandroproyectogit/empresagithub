<?php
class Controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }

    //Pedidos

    public function agregarPedido($id, $cli, $rec, $paq, $fec, $val, $est)
    {
        $pedido = new Pedido($id, $cli, $rec, $paq, $fec, $val, $est);
        
        $gestor = new GestorPedido();
        $gestorUsuario = new GestorUsuario();
        $id=$gestorUsuario->buscarUsuarioId($_SESSION['usuario']);
        if($id==$_SESSION['usuario']){
            $registros = $gestor->agregarPedido($pedido,$id);
            if ($registros > 0) {
                echo "<script>
                    window.location.href='index.php?accion=pedidos&success=true';
                </script>";
            } else {
                echo "<script>
                    window.location.href='index.php?accion=pedidos&error=true';
                </script>";
            }
        }
    }

    public function listarPedidos()
    {
        $gestor = new GestorPedido();
        $gestor1 = new GestorCliente();
        $resultPedidos = $gestor->listarPedidos();
        $resultClientes = $gestor1->listarClientes();
        $resultReceta = $gestor->listarRecetas();
        require_once 'Vista/html/pedidos.php';
    }

    public function editarPedidos($id, $paquetes, $valor, $estado)
    {
        if (empty($paquetes) || empty($estado)) {
            echo '<script>alert("Todos los campos deben de estar llenos");</script>';
            return;
        }
    
        $gestor = new GestorPedido();
        $registros = $gestor->editarPedidos($id, $paquetes, $valor, $estado);
        if ($registros > 0) {
            echo "<script>
                window.location.href='index.php?accion=pedidos&Uppedsuccess=true';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=pedidos&Uppederror=true';
            </script>";
        }
    }
    //PROVEEDOR
    public function mostrarProveedores(){
        $gestorProveedor = new GestorProveedor();
        $resultado=$gestorProveedor->traerProveedores();
        require_once 'Vista/html/proveedores.php';
    }
    public function agregarProveedor($nombre,$telefono,$direccion){
        $gestorProveedor = new GestorProveedor();
        $resultadoRegistro=$gestorProveedor->registrarProveedor($nombre,$telefono,$direccion);
        if($resultadoRegistro==1){
            $_SESSION["mensaje"]="Proveedor Agregado con éxito";
            $_SESSION["resultado"]=1;
        }else{
            $_SESSION["mensaje"]="Error al agregar Proveedor";
            $_SESSION["resultado"]=0;
        }
    }

    //CLIENTE
    public function agregarCliente($id, $nom, $tel, $dir)
    {
        $cliente = new Cliente($id, $nom, $tel, $dir);
        $gestor = new Gestor();
        $registros = $gestor->agregarCliente($cliente);
        if ($registros > 0) {
            echo "<script>
                window.location.href='index.php?accion=clientes&clisuccess=true';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=clientes&clierror=true';
            </script>";
        }
    }

    public function listarCliente()
    {
        $gestor = new Gestor();
        $resultClientes = $gestor->listarClientes();
        require_once 'Vista/html/clientes.php';
    }

    public function editarClientes($id, $nuevoNombre, $nuevoTelefono, $nuevaDireccion)
    {
        $gestor = new Gestor();
        $registros = $gestor->editarClientes($id, $nuevoNombre, $nuevoTelefono, $nuevaDireccion);
        if ($registros > 0) {
            echo "<script>
                window.location.href='index.php?accion=clientes&Upclisuccess=true';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=clientes&Upclierror=true';
            </script>";
        }
        
    }
    //PRODUCTOS
    public function agregarProducto($proid, $pronom, $promed, $prodtent, $prodtsal)
    {       
        $gestor = new GestorProducto();
        $producto = new Producto($proid, $pronom, $promed, $prodtent, $prodtsal);

        $registros = $gestor->agregarProducto($producto);
        if ($registros > 0) {
            echo "<script>
                window.location.href='index.php?accion=productos&prodsuccess=true';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=productos&proderror=true';
            </script>";
        }
    }
    public function actualizarProductos()
    {
        if (
            isset($_POST['prod_id']) && !empty($_POST['prod_id']) &&
            isset($_POST['Upnombreprod']) && !empty($_POST['Upnombreprod']) &&
            isset($_POST['Upunidad']) && !empty($_POST['Upunidad'])
        ) {

            $prod_id = $_POST['prod_id'];
            $prod_nombre = $_POST['Upnombreprod'];
            $prod_medida = $_POST['Upunidad'];

            $gestor = new GestorProducto();
            $registros = $gestor->actualizarProductos($prod_id, $prod_nombre, $prod_medida);

            if ($registros > 0) {
                echo "<script>
                    window.location.href='index.php?accion=productos&Upprodsuccess=true';
                </script>";
            } else {
                echo "<script>
                    window.location.href='index.php?accion=productos&Upproderror=true';
                </script>";
            }
        } else {
            echo '<script>alert("Faltan datos o el ID no es válido."); window.location.href="index.php?accion=productos";</script>';
        }
    }
    public function obtenerDatosProductos()
    {
        $gestor = new GestorProducto();
        $producto = $gestor->obtenerDatosProductos();
        require_once 'Vista/html/productos.php';
    }
    public function documentpdf()
    {
        $gestor = new GestorProducto();
        $result = $gestor->obtenerDatosProductos();
        require_once 'Vista/html/reportesproductos.php';
    }
    //USUARIOS
    public function agregarPersonal($nomc, $corr, $tele, $usu, $contra, $usucar, $usuest)
    {
        $gestor = new GestorTrabajador();
        $hashedPassword = password_hash($contra, PASSWORD_DEFAULT);
        $personal = new Personal($nomc, $corr, $tele, $usu, $hashedPassword, $usucar, $usuest);

        $registros = $gestor->agregarPersonal($personal);
        if ($registros > 0) {
            echo "<script>
                window.location.href='index.php?accion=trabajadores&success=true';
            </script>";
        } else {
            echo "<script>
                window.location.href='index.php?accion=trabajadores&error=true';
            </script>";
        }
        
        
    }

    public function obtenerDatosUsuario($usu_id)
    {
        $gestor = new Gestor();
        $usuario = $gestor->obtenerDatosUsuario($usu_id);
        return $usuario;
    }

    public function verPaginaTrabajadores($filtro)
    {
        $gestor = new Gestor();
        $administradores = $gestor->obtenerAdministradoresPorFiltro($filtro);
        $empleados = $gestor->obtenerTrabajadoresPorFiltro($filtro);
        require_once 'Vista/html/trabajadores.php';
    }

    public function actualizarUsuario()
    {
        if (
            isset($_POST['usu_id']) && !empty($_POST['usu_id']) &&
            isset($_POST['Upnombre']) && !empty($_POST['Upnombre']) &&
            isset($_POST['Upcorreo']) && !empty($_POST['Upcorreo']) &&
            isset($_POST['Uptelefono']) && !empty($_POST['Uptelefono']) &&
            isset($_POST['Upusuario']) && !empty($_POST['Upusuario']) &&
            isset($_POST['Upcargo']) && !empty($_POST['Upcargo']) &&
            isset($_POST['Upestado']) && !empty($_POST['Upestado'])
        ) {

            $id = $_POST['usu_id'];
            $nombrec = $_POST['Upnombre'];
            $correo = $_POST['Upcorreo'];
            $telefono = $_POST['Uptelefono'];
            $usuario = $_POST['Upusuario'];
            $usuario_cargo = $_POST['Upcargo'];
            $usuarioEstado = $_POST['Upestado'];

            $gestor = new GestorTrabajador();
            $registros = $gestor->actualizarUsuario($id, $nombrec, $correo, $telefono, $usuario, $usuario_cargo, $usuarioEstado);

            if ($registros > 0) {
                echo "<script>
                    window.location.href='index.php?accion=trabajadores&Upsuccess=true';
                </script>";
            } else {
                echo "<script>
                    window.location.href='index.php?accion=trabajadores&Uperror=true';
                </script>";
            }
        } else {
            echo '<script>alert("Faltan datos o el ID no es válido."); window.location.href="index.php?accion=trabajadores";</script>';
        }
    }
    public function aumentarIntento($usuario){
        $gestorUsuario = new GestorUsuario();
        $result=$gestorUsuario->buscarUsuario($usuario);
        if($result >0){
            $gestorUsuario->aumentarIntento($usuario);
        }
        
    }

    public function verificar($user,$password)
    {
        $usuario = new Usuario(
            $user,
            $password
        );
        $gestorUsuario = new GestorUsuario();
        $result=$gestorUsuario->busqueda($usuario);
        return $result;
    }


    public function generarCodigo($length){
        $datos="1234567890";
        $codigo="";
        for($i=0; $i<$length; $i++){
            $numero = mt_rand(0,$length-1);
            $codigo .= $datos[$numero];
        }
        return $codigo;
    }
    
    public function recordarContraseña($correo,$codigo)
    {
        $gestorUsuario = new GestorUsuario();
        
        $resultado=$gestorUsuario->existenciaCorreo($correo);
        if($resultado==true){
            $gestorUsuario->enviarCorreo($correo,$codigo);
        }else{
           $_SESSION['mensaje'] = "Ese correo no esta registrado";
        }
        return $resultado;
       
    }
    public function analisisLogin($usuario,$contraseña){
        $resultado=false;
       if( preg_match('/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $usuario) &&
        preg_match('/^[0-9a-zA-Z]+$/', $contraseña)){
            $resultado=true;
            return $resultado;
        }else{
            return $resultado;
        }
    }
    public function analisisValidarCodigo($entrada1,$entrada2,$entrada3,$entrada4,$entrada5,$entrada6,$entrada7,$entrada8,$codigo){
        $resultado=false;
        if(empty($entrada1) &&
            empty($entrada2) &&
            empty($entrada3) &&
            empty($entrada4) &&
            empty($entrada5) &&
            empty($entrada6) &&
            empty($entrada7) &&
            empty($entrada8)
        ){
            $_SESSION['mensaje']="Ningun campo debe estar vacio";
            
        }elseif(preg_match('/^[0-9a-zA-Z]+$/', $entrada1) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada2) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada3) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada4) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada5) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada6) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada7) &&
            preg_match('/^[0-9a-zA-Z]+$/', $entrada8) 
        ){
            $codigoIngresado=$entrada1.$entrada2.$entrada3.$entrada4.$entrada5.$entrada6.$entrada7.$entrada8;
            if(isset($_SESSION['tiempo']) && (time() - $_SESSION['tiempo'] < 300)){
                
                if($codigoIngresado==$codigo){
                    $resultado=true;
                  
                }else{
                    $_SESSION['mensaje']="El codigo es incorrecto";
                }
                
            }else{
                $_SESSION['mensaje']="Error: El código ha expirado";
                unset($_SESSION['codigo']);
                unset($_SESSION['correo']);
            
            }
            
        }else{
            $_SESSION['mensaje']="No se aceptan caracteres especiales";
           
        }
        return $resultado;
    }
    public function existenciaCorreo($correo){
        $gestorUsuario = new GestorUsuario();
        $resultado=$gestorUsuario->existenciaCorreo($correo);
        return $resultado;
    }
    public function analizarContraseña($contraseña1,$contraseña2){
        $resultado=false;
        if(preg_match('/^[0-9a-zA-Z]+$/', $contraseña1) &&
        preg_match('/^[0-9a-zA-Z]+$/', $contraseña2)
        ){
            if($contraseña1==$contraseña2){
                $resultado=true;
                
            }else{
                $_SESSION['mensaje']="Las contraseñas no coinciden";
            }
        }else{
            $_SESSION['mensaje']="No se aceptan caracteres especiales";
        }
        return $resultado;
    }
    public function actualizarContraseña($correo,$contraseña){
        $gestorUsuario = new GestorUsuario();
        $contraseñaSegura=password_hash($contraseña,PASSWORD_DEFAULT);
        $resultado=$gestorUsuario->actualizarContraseña($correo,$contraseñaSegura);
        return $resultado;
    }
    public function observarIntentos($usuario){
        $permitir = true; 
        $gestorUsuario = new GestorUsuario;
        $resultado=$gestorUsuario->buscarUsuarioIntentos($usuario);
        if($resultado){
            if($resultado["usu_intentos"]>2){
                $permitir=false;
            }    
        }
        return $permitir;

    }
}
