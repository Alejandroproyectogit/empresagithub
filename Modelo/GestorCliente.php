<?php
class GestorCliente
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
        $conexion->consulta($sql, 0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function listarClientes()
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM clientes;");
        $conexion->consulta($sql, 2);
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
        $conexion->consulta($sql, 0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
}
