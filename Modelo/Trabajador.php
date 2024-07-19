<?php
class Personal
{
    private $nombrec;
    private $correo;
    private $telefono;
    private $usuario;
    private $contrasena;
    private $usuario_cargo;
    private $usuarioEstado;

    public function __construct($nomc, $corr, $tele, $usu, $contra, $usucar, $usuest)
    {
        $this->nombrec = $nomc;
        $this->correo = $corr;
        $this->telefono = $tele;
        $this->usuario = $usu;
        $this->contrasena = $contra;
        $this->usuario_cargo = $usucar;
        $this->usuarioEstado = $usuest;
    }
    public function obtenerNombrecom()
    {
        return $this->nombrec;
    }
    public function obtenerCorreo()
    {
        return $this->correo;
    }
    public function obtenerTelefono()
    {
        return $this->telefono;
    }
    public function obtenerUsuario()
    {
        return $this->usuario;
    }
    public function obtenerContrasena()
    {
        return $this->contrasena;
    }
    public function obtenerUsuarioCargo()
    {
        return $this->usuario_cargo;
    }
    public function obtenerEstado()
    {
        return $this->usuarioEstado;
    }
}