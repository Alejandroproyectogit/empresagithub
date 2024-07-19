<?php
class GestorProveedor{
    public function traerProveedores(){
        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $sql = $enlace_conexion->prepare("SELECT * FROM proveedores;");
        $conexion->consulta($sql,2);
        $resultado=$conexion->obtenerResultadoAll();
        $conexion->cerrar();
        return $resultado;
    }
    public function registrarProveedor($nombre,$telefono,$direccion){
        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $sql = $enlace_conexion->prepare("INSERT INTO proveedores VALUES (null,:prov_nombre,:prov_telefono,:prov_direccion);");
        $sql->bindParam(":prov_nombre",$nombre,PDO::PARAM_STR);
        $sql->bindParam(":prov_telefono",$telefono,PDO::PARAM_STR);
        $sql->bindParam(":prov_direccion",$direccion,PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $resultado=$conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $resultado;
    }
}