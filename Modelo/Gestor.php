<?php
class Gestor
{
    public function agregarCliente(Cliente $cliente)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $nombre = $cliente->obtenerNombre();
        $telefono = $cliente->obtenerTelefono();
        $direccion = $cliente->obtenerDireccion();
        $sql = $enlaceConexion->prepare("INSERT INTO clientes VALUES (NULL,:nombre,:telefono,:direccion)");
        $sql->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $sql->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $sql->bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function listarClientes()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM clientes;");
        $conexion->consulta($sql,2);
        $result = $conexion->obtenerResultadoAll();
        $conexion->cerrar();
        return $result;
    }

    public function editarClientes($id, $nuevoNombre, $nuevoTelefono, $nuevaDireccion)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("UPDATE clientes SET cli_nombre =:nuevoNombre, cli_telefono =:nuevoTelefono, cli_direccion =:nuevaDireccion where cli_id=:id");
        $sql->bindParam(":nuevoNombre", $nuevoNombre, PDO::PARAM_STR);
        $sql->bindParam(":nuevoTelefono", $nuevoTelefono, PDO::PARAM_STR);
        $sql->bindParam(":nuevaDireccion", $nuevaDireccion, PDO::PARAM_STR);
        $sql->bindParam(":id", $id, PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function agregarPedido(Pedido $pedido)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $cliente = $pedido->obtenerCliente();
        $receta = $pedido->obtenerReceta();
        $paquetes = $pedido->obtenerPaquetes();
        $fecha = $pedido->obtenerFecha();
        $valor = $pedido->obtenerValor();
        $estado = $pedido->obtenerEstado();
        $sql = $enlaceConexion->prepare("INSERT INTO pedidos VALUES (NULL,:cliente,:receta,:paquetes,:fecha,:valor,:estado)");
        $sql->bindParam(":cliente", $cliente, PDO::PARAM_INT);
        $sql->bindParam(":receta", $receta, PDO::PARAM_INT);
        $sql->bindParam(":paquetes", $paquetes, PDO::PARAM_INT);
        $sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $sql->bindParam(":valor", $valor, PDO::PARAM_INT);
        $sql->bindParam(":estado", $estado, PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function listarPedidos()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT p.ped_id, c.cli_nombre AS nombre_cliente, c.cli_direccion AS direccion_cliente, 
                       r.rec_nombre AS nombre_receta,
                       p.ped_paquetes, p.ped_fecha, p.ped_valor, p.ped_estado
                FROM pedidos p
                JOIN clientes c ON p.ped_id_cliente = c.cli_id
                JOIN receta r ON p.ped_id_receta = r.rec_id");
        $conexion->consulta($sql,2);
        $result = $conexion->obtenerResultadoAll();
        $conexion->cerrar();
        return $result;
    }

    public function editarPedidos($id, $paquetes, $valor, $estado)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("UPDATE pedidos SET ped_paquetes=:paquetes, ped_valor=:valor, ped_estado=:estado WHERE ped_id =:id");
        $sql->bindParam(":paquetes",$paquetes,PDO::PARAM_INT);
        $sql->bindParam(":valor",$valor,PDO::PARAM_INT);
        $sql->bindParam(":estado",$estado,PDO::PARAM_STR);
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        $conexion->consulta($sql,0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function listarRecetas()
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM receta"); 
        $conexion->consulta($sql,2);
        $result = $conexion->obtenerResultadoAll();
        $conexion->cerrar();
        return $result;
    }

    public function agregarPersonal(Personal $personal)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();

        $nombrec = $personal->obtenerNombrecom();
        $correo = $personal->obtenerCorreo();
        $telefono = $personal->obtenerTelefono();
        $usuario = $personal->obtenerUsuario();
        $contrasena = $personal->obtenerContrasena(); 
        $usuario_cargo = $personal->obtenerUsuarioCargo();
        $usuarioEstado = $personal->obtenerEstado();

        $sql = $enlaceConexion->prepare("INSERT INTO usuarios 
        VALUES (NULL,:nombre,:correo,:telefono,:usuario,:contrasena,:cargo,:estado,NULL);"); 
        
        $sql->bindParam(":nombre",$nombrec, PDO::PARAM_STR);
        $sql->bindParam(":correo",$correo, PDO::PARAM_STR);
        $sql->bindParam(":telefono",$telefono, PDO::PARAM_STR);
        $sql->bindParam(":usuario",$usuario, PDO::PARAM_STR);
        $sql->bindParam(":contrasena",$contrasena, PDO::PARAM_STR);
        $sql->bindParam(":cargo",$usuario_cargo, PDO::PARAM_INT);
        $sql->bindParam(":estado",$usuarioEstado, PDO::PARAM_INT);
        
        $conexion->consulta($sql,0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function obtenerUsuariosAdministradores()
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo = 1 AND usu_estado = 1");
        $conexion->consulta($sql,1);
        $usuarios = $conexion->obtenerResultado();
        $conexion->cerrar();

        return $usuarios;
    }

    public function obtenerUsuariosEmpleados()
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo = 2 AND usu_estado = 1");
        $conexion->consulta($sql,2);
        $usuarios = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $usuarios;
    }

    public function obtenerAdministradoresPorFiltro($filtro)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo=1 and usu_estado =:estado");
        $sql->bindParam(":estado",$filtro,PDO::PARAM_INT);
        $conexion->consulta($sql,2);
        $usuarios = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $usuarios;
    }
    public function obtenerTrabajadoresPorFiltro($filtro)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo=2 and usu_estado =:estado");
        $sql->bindParam(":estado",$filtro,PDO::PARAM_INT);
        $conexion->consulta($sql,2);
        $usuarios = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $usuarios;
    }

    public function obtenerDatosUsuario($usu_id)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();

        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id = :id"); 
        $sql->bindParam(":id",$usu_id,PDO::PARAM_INT);
        $conexion->consulta($sql,1);
        $usuario = $conexion->obtenerResultado();
        $conexion->cerrar();

        return $usuario;
    }

    public function actualizarUsuario($id, $nombrec, $correo, $telefono, $usuario, $usuario_cargo, $usuarioEstado)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("UPDATE usuarios SET 
                    usu_nombres =:nombre, 
                    usu_correo =:correo, 
                    usu_telefono =:telefono, 
                    usu_usuario =:usuario, 
                    usu_id_cargo =:cargo, 
                    usu_estado = :estado 
                WHERE usu_id =:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        $sql->bindParam(":nombre",$nombrec,PDO::PARAM_STR);
        $sql->bindParam(":correo",$correo,PDO::PARAM_STR);
        $sql->bindParam(":telefono",$telefono,PDO::PARAM_STR);
        $sql->bindParam(":usuario",$usuario,PDO::PARAM_STR);
        $sql->bindParam(":cargo",$usuario_cargo,PDO::PARAM_INT);
        $sql->bindParam(":estado",$usuarioEstado,PDO::PARAM_INT);
        $conexion->consulta($sql,0);
        $result = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();

        return $result;
    }
}
