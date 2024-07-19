<?php
class Proveedor{
    private $id;
    private $direccion;
    private $nombre;
    private $telefono;

    public function __construct($id,$direccion,$nombre,$telefono)
    {
        $this->id = $id;
        $this->direccion= $direccion;
        $this->nombre = $nombre;
        $this->telefono= $telefono;
    }
    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerDireccion()
    {
        return $this->direccion;
    }
    public function obtenerNombre(){
        return $this->nombre;
    }
    public function obtenerTelefono(){
        return $this->telefono;
    }
}