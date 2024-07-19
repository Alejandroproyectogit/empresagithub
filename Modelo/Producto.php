<?php
class Producto
{
    private $prod_id;
    private $prod_nombre;
    private $prod_medida;
    private $prod_totalent;
    private $prod_totalsal;
    
    public function __construct($proid, $pronom, $promed, $prodtent, $prodtsal)
    {
        $this->prod_id = $proid;
        $this->prod_nombre = $pronom;
        $this->prod_medida = $promed;
        $this->prod_totalent = $prodtent;
        $this->prod_totalsal = $prodtsal;
    }
    public function obtenerIDproducto()
    {
        return $this->prod_id;
    }
    public function obtenerNombreprod()
    {
        return $this->prod_nombre;
    }
    public function obtenerUnidadmedida()
    {
        return $this->prod_medida;
    }
    public function obtenerTotalentradas()
    {
        return $this->prod_totalent;
    }
    public function obtenerTotalsalidas()
    {
        return $this->prod_totalsal;
    }
}