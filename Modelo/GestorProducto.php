<?php
class GestorProducto
{
    public function agregarProducto(Producto $producto)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $prod_id = $producto->obtenerIDproducto();
        $prod_nombre = $producto->obtenerNombreprod();
        $prod_medida = $producto->obtenerUnidadmedida();
        $prod_totalent= $producto->obtenerTotalentradas();
        $prod_totalsal = $producto->obtenerTotalsalidas();

        $sql = $enlaceConexion->prepare("INSERT INTO productos 
        VALUES (:produid,:nombreprod,:medidaprod,:tentprod,:tsalprod);"); 
        
        $sql->bindParam(":produid",$prod_id, PDO::PARAM_INT);
        $sql->bindParam(":nombreprod",$prod_nombre, PDO::PARAM_STR);
        $sql->bindParam(":medidaprod",$prod_medida, PDO::PARAM_STR);
        $sql->bindParam(":tentprod",$prod_totalent, PDO::PARAM_INT);
        $sql->bindParam(":tsalprod",$prod_totalsal, PDO::PARAM_INT);
        
        $conexion->consulta($sql,0);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }


    public function obtenerDatosProductos()
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();

        $sql = $enlaceConexion->prepare("SELECT * FROM productos;"); 
        $conexion->consulta($sql,2);
        $producto = $conexion->obtenerResultadoAll();
        $conexion->cerrar();
        return $producto;
    }

    public function actualizarProductos($prod_id, $prod_nombre, $prod_medida)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("UPDATE productos SET 
                    prod_id =:id, 
                    prod_nombre =:nombre, 
                    prod_unidad_medida =:unidadmed 
                WHERE prod_id =:id");
        $sql->bindParam(":id",$prod_id,PDO::PARAM_INT);
        $sql->bindParam(":nombre",$prod_nombre,PDO::PARAM_STR);
        $sql->bindParam(":unidadmed",$prod_medida,PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $result = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();

        return $result;
    }

}
