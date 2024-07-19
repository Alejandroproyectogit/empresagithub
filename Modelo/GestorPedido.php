<?php
class GestorPedido
{
    // Método para agregar un pedido a la base de datos
    public function agregarPedido(Pedido $pedido,$id)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        // Obtener los datos del pedido
        $cliente = $pedido->obtenerCliente();
        $receta = $pedido->obtenerReceta();
        $paquetes = $pedido->obtenerPaquetes();
        $fecha = $pedido->obtenerFecha();
        $valor = $pedido->obtenerValor();
        $estado = $pedido->obtenerEstado();

        // Preparar la consulta SQL
        $sql = $enlaceConexion->prepare("INSERT INTO pedidos VALUES (NULL, :cliente, :receta, :paquetes, :fecha, :valor, :estado,:encargado)");
        $sql->bindParam(":cliente", $cliente, PDO::PARAM_INT);
        $sql->bindParam(":receta", $receta, PDO::PARAM_INT);
        $sql->bindParam(":paquetes", $paquetes, PDO::PARAM_INT);
        $sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $sql->bindParam(":valor", $valor, PDO::PARAM_INT);
        $sql->bindParam(":estado", $estado, PDO::PARAM_STR);
        $sql->bindParam(":encargado",$id,PDO::PARAM_STR);

        // Ejecutar la consulta
        $conexion->consulta($sql, 0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();

        return $filasAfectadas;
    }
    // Método para listar todos los pedidos de la base de datos
    public function listarPedidos()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        // Preparar la consulta SQL
        $sql = $enlaceConexion->prepare("SELECT p.ped_id, c.cli_nombre AS nombre_cliente, c.cli_direccion AS direccion_cliente, 
                       r.rec_nombre AS nombre_receta, p.ped_paquetes, p.ped_fecha, p.ped_valor, p.ped_estado,u.usu_nombres as nombre_encargado
                FROM pedidos p
                JOIN clientes c ON p.ped_id_cliente = c.cli_id
                JOIN receta r ON p.ped_id_receta = r.rec_id
                JOIN usuarios u ON p.ped_encargado = u.usu_id 
                ");

        // Ejecutar la consulta
        $conexion->consulta($sql, 2);
        $result = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $result;
    }

    // Método para editar un pedido existente en la base de datos
    public function editarPedidos($id, $paquetes, $valor, $estado)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        // Preparar la consulta SQL
        $sql = $enlaceConexion->prepare("UPDATE pedidos SET ped_paquetes=:paquetes, ped_valor=:valor, ped_estado=:estado WHERE ped_id =:id");
        $sql->bindParam(":paquetes", $paquetes, PDO::PARAM_INT);
        $sql->bindParam(":valor", $valor, PDO::PARAM_INT);
        $sql->bindParam(":estado", $estado, PDO::PARAM_STR);
        $sql->bindParam(":id", $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $conexion->consulta($sql, 0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();

        return $filasAfectadas;
    }

    // Método para listar todas las recetas de la base de datos
    public function listarRecetas()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        // Preparar la consulta SQL
        $sql = $enlaceConexion->prepare("SELECT * FROM receta");

        // Ejecutar la consulta
        $conexion->consulta($sql, 2);
        $result = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $result;
    }
}
