<?php
class Conexion
{
    private $host = 'localhost';
    private $db = 'inventario_est';
    private $user = 'root';
    private $pass = '';
    private $dns;
    private $sql;
    private $conexion;
    private $resultado;
    private $resultadoAll;
    private $filasAfectadas;
    private $dato;

    public function abrir()
    {
        $this->dns = "mysql:host=$this->host;dbname=$this->db;";
        try{
            $this->conexion = new PDO($this->dns, $this->user,$this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            return $this->conexion;
        }
        catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function cerrar()
    {
        $this->conexion= null;
    }
    public function consulta($sql,$opcion)
    {
        $this->sql=$sql;
        try {
            
            $this->sql->execute();
            if($opcion==1){
                $this->resultado=$this->sql->fetch(PDO::FETCH_ASSOC);
            }elseif($opcion==2){
                $this->resultadoAll = $this->sql->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->filasAfectadas = $this->sql->rowCount();
            $this->dato = $this->conexion->lastInsertId();
        
        }
        catch(\PDOException $e){
            throw new \PDO($e->getMessage(),(int)$e->getCode());
        }
        
    }
    public function obtenerResultado()
    {
        return $this->resultado;
    }
    public function obtenerResultadoAll()
    {
        return $this->resultadoAll;
    }
    public function obtenerFilasAfectadas()
    {
        return $this->filasAfectadas;
    }
    public function obtenerDato()
    {
        return $this->dato;
    }
    public function getConexion()
    {
        return $this->conexion;
    }
}
?>