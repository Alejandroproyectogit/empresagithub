<?php
class GestorTrabajador
{
    public function agregarPersonal(Personal $personal)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();

        $nombrec = $personal->obtenerNombrecom();
        $correo = $personal->obtenerCorreo();
        $telefono = $personal->obtenerTelefono();
        $usuario = $personal->obtenerUsuario();
        $contrasena = $personal->obtenerContrasena(); 
        $usuario_cargo = $personal->obtenerUsuarioCargo();
        $usuarioEstado = $personal->obtenerEstado();
        $validacionSql = $enlaceConexion->prepare("SELECT * FROM usuarios");
        $conexion->consulta($validacionSql,2);
        $resultado = $conexion->obtenerResultadoAll();
        $veriCorreo = false;
        $veriTele = false;
        $veriUsu = false;
        foreach($resultado as $dato){
            if($dato["usu_correo"]==$correo){
                $veriCorreo = true;
            }if($dato["usu_telefono"]==$telefono){
                $veriTele = true;
            }if($dato["usu_usuario"]==$usuario){
                $veriUsu = true;
            }
        }


        if($veriCorreo==false && $veriTele==false && $veriUsu==false){
            $sql = $enlaceConexion->prepare("INSERT INTO usuarios 
            VALUES (NULL,:nombre,:correo,:telefono,:usuario,:contrasena,:cargo,:estado,NULL);"); 
            
            $sql->bindParam(":nombre",$nombrec, PDO::PARAM_STR);
            $sql->bindParam(":correo",$correo, PDO::PARAM_STR);
            $sql->bindParam(":telefono",$telefono, PDO::PARAM_STR);
            $sql->bindParam(":usuario",$usuario, PDO::PARAM_STR);
            $sql->bindParam(":contrasena",$contrasena, PDO::PARAM_STR);
            $sql->bindParam(":cargo",$usuario_cargo, PDO::PARAM_INT);
            $sql->bindParam(":estado",$usuarioEstado, PDO::PARAM_INT);
            
            $conexion->consulta($sql,0);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $filasAfectadas;
        }else{
            if($veriCorreo==true){
                echo "<script>
                window.location.href='index.php?accion=trabajadores&yacorreo=true';
                </script>";
            };
            if($veriTele==true){
                echo "<script>
                window.location.href='index.php?accion=trabajadores&yatelefono=true';
                </script>";
            };
            if($veriUsu==true){
                echo "<script>
                window.location.href='index.php?accion=trabajadores&yausuario=true';
                </script>";
            };
            if($veriUsu==true && $veriCorreo==true && $veriTele==true){
                echo "<script>
                window.location.href='index.php?accion=trabajadores&cominfo=true';
                </script>";
            };
        };
    }

    public function obtenerUsuariosAdministradores()
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo = 1 AND usu_estado = 1");
        $conexion->consulta($sql,1);
        $usuarios = $conexion->obtenerResultado();
        $conexion->cerrar();

        return $usuarios;
    }

    public function obtenerUsuariosEmpleados()
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo = 2 AND usu_estado = 1");
        $conexion->consulta($sql,2);
        $usuarios = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $usuarios;
    }

    public function obtenerAdministradoresPorFiltro($filtro)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo=1 and usu_estado =:estado");
        $sql->bindParam(":estado",$filtro,PDO::PARAM_INT);
        $conexion->consulta($sql,2);
        $usuarios = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $usuarios;
    }
    public function obtenerTrabajadoresPorFiltro($filtro)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id_cargo=2 and usu_estado =:estado");
        $sql->bindParam(":estado",$filtro,PDO::PARAM_INT);
        $conexion->consulta($sql,2);
        $usuarios = $conexion->obtenerResultadoAll();
        $conexion->cerrar();

        return $usuarios;
    }

    public function obtenerDatosUsuario($usu_id)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();

        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id = :id"); 
        $sql->bindParam(":id",$usu_id,PDO::PARAM_INT);
        $conexion->consulta($sql,1);
        $usuario = $conexion->obtenerResultado();
        $conexion->cerrar();

        return $usuario;
    }

    public function actualizarUsuario($id, $nombrec, $correo, $telefono, $usuario, $usuario_cargo, $usuarioEstado)
    {
        $conexion = new Conexion();
        $enlaceConexion=$conexion->abrir();
        $sql = $enlaceConexion->prepare("UPDATE usuarios SET 
                    usu_nombres =:nombre, 
                    usu_correo =:correo, 
                    usu_telefono =:telefono, 
                    usu_usuario =:usuario, 
                    usu_id_cargo =:cargo, 
                    usu_estado = :estado 
                WHERE usu_id =:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        $sql->bindParam(":nombre",$nombrec,PDO::PARAM_STR);
        $sql->bindParam(":correo",$correo,PDO::PARAM_STR);
        $sql->bindParam(":telefono",$telefono,PDO::PARAM_STR);
        $sql->bindParam(":usuario",$usuario,PDO::PARAM_STR);
        $sql->bindParam(":cargo",$usuario_cargo,PDO::PARAM_INT);
        $sql->bindParam(":estado",$usuarioEstado,PDO::PARAM_INT);
        $conexion->consulta($sql,0);
        $result = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();

        return $result;
    }
}
