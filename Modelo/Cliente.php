<?php
class Cliente
{
    private $id;
    private $nombre;
    private $telefono;
    private $direccion;

    public function __construct($id,$nom, $tel, $dir)
    {
        $this->id=$id;
        $this->nombre = $nom;
        $this->telefono = $tel;
        $this->direccion = $dir;
    }
    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function obtenerTelefono()
    {
        return $this->telefono;
    }
    public function obtenerDireccion()
    {
        return $this->direccion;
    }
}