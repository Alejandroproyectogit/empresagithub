<?php
class Usuario
{
    private $usuario;
    private $contraseña;

    public function __construct($user,$password)
    {
        $this->usuario = $user;
        $this->contraseña = $password;

    }
    public function obtenerUsuario()
    {
        return $this->usuario;
    }
    public function obtenerContraseña()
    {
        return $this->contraseña;
    }
    
}
