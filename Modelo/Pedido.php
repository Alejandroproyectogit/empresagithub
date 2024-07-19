<?php
class Pedido
{
    private $id;
    private $cliente;
    private $receta;
    private $paquetes;
    private $fecha;
    private $valor;
    private $estado;

    public function __construct($id ,$cli, $rec, $paq, $fec, $val, $est)
    {
        $this->id = $id;
        $this->cliente = $cli;
        $this->receta = $rec;
        $this->paquetes = $paq;
        $this->fecha = $fec;
        $this->valor = $val;
        $this->estado = $est;
    }
    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerCliente()
    {
        return $this->cliente;
    }
    public function obtenerReceta()
    {
        return $this->receta;
    }
    public function obtenerPaquetes()
    {
        return $this->paquetes;
    }
    public function obtenerFecha()
    {
        return $this->fecha;
    }
    public function obtenerValor()
    {
        return $this->valor;
    }
    public function obtenerEstado()
    {
        return $this->estado;
    }
}