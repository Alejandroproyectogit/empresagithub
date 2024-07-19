<?php
class Receta
{
    private $id;
    private $nombre;
    private $produccion;
    private $ventas;

    public function __construct($id ,$nom, $pro, $ven)
    {
        $this->id = $id;
        $this->nombre = $nom;
        $this->produccion = $pro;
        $this->ventas = $ven;
    }
    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function obtenerProduccion()
    {
        return $this->produccion;
    }
    public function obtenerVentas()
    {
        return $this->ventas;
    }
}