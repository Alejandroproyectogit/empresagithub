<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Vista/lib/PHPMailer/src/Exception.php';
require 'Vista/lib/PHPMailer/src/PHPMailer.php';
require 'Vista/lib/PHPMailer/src/SMTP.php';

class GestorUsuario
{
    public function busqueda(Usuario $usuario)
    {
        $credencialesCorrectas=false;

        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $user_sql = $usuario->obtenerUsuario();
        $password = $usuario->obtenerContraseña();
        $sql = $enlace_conexion->prepare("SELECT * FROM usuarios WHERE usu_usuario=:user_sql or usu_correo=:user_sql;");
        $sql->bindParam(":user_sql", $user_sql, PDO::PARAM_STR);
        $conexion->consulta($sql,1);
        $resultado = $conexion->obtenerResultado();
        $conexion->cerrar();
        

        if ($resultado) {
            if (($resultado["usu_usuario"] == $user_sql || $resultado["usu_correo"]==$user_sql) && password_verify($password,$resultado["usu_contrasena"])) {
                $credencialesCorrectas=true;
                $_SESSION['usuario']=$resultado["usu_id"];
            }
        }
        return $credencialesCorrectas;
    }
    public function buscarUsuarioId($id){
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_id=:id;");
        $sql->bindParam(":id", $id, PDO::PARAM_STR);
        $conexion->consulta($sql,1);
        $resultado = $conexion->obtenerResultado();
        $id=$resultado["usu_id"];
        $conexion->cerrar();
        return $id;
    }
    public function buscarUsuario($usuario){
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_usuario=:usuario;");
        $sql->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $resultado = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $resultado;
    }
    public function buscarUsuarioIntentos($usuario){
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("SELECT * FROM usuarios WHERE usu_usuario=:usuario;");
        $sql->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $conexion->consulta($sql,1);
        $resultado = $conexion->obtenerResultado();
        $conexion->cerrar();
        return $resultado;
    }

    public function aumentarIntento($usuario){
        $conexion = new Conexion;
        $enlaceConexion = $conexion->abrir();
        $sql = $enlaceConexion->prepare("UPDATE usuarios set usu_intentos = usu_intentos +1 WHERE usu_usuario = :usuario");
        $sql->bindParam(":usuario",$usuario,PDO::PARAM_STR);
        $conexion->consulta($sql,0);
        $conexion->cerrar();
    }


    public function existenciaCorreo($correo)
    {
        $existe=false;
        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $sql = $enlace_conexion->prepare("SELECT * FROM usuarios WHERE usu_correo=:correo_sql and usu_estado = 1");
        $sql->bindParam("correo_sql", $correo, PDO::PARAM_STR);
        $conexion->consulta($sql,1);
        $resultado = $conexion->obtenerResultado();
        $conexion->cerrar();
        if ($resultado) {
            if ($resultado["usu_correo"] == $correo and $resultado["usu_estado"] == 1) {
                $existe=true;
                
            }else{
                $existe=false;
            }
            
        }return $existe; 
        
    }
    public function actualizarContraseña($correo,$contraseñaSegura){
        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $sql = $enlace_conexion->prepare("UPDATE usuarios SET usu_contrasena=:contrasena_sql WHERE usu_correo=:correo_sql and usu_estado = 1;");
        $sql->bindParam("correo_sql", $correo, PDO::PARAM_STR);
        $sql->bindParam("contrasena_sql", $contraseñaSegura, PDO::PARAM_STR);
        $resultado=$conexion->consulta($sql,0);
        $conexion->cerrar();
        return $resultado;
    }
 
    public function enviarCorreo($correo,$codigo){
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'servicioSaborT@gmail.com';                     //SMTP username
            $mail->Password   = 'tdoftcaotoknfoag';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('servicioSaborT@gmail.com', 'Sabor Tolimense');
            $mail->addAddress($correo);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Solicitud de restablecimiento de contraseña';
            $mail->Body    = '<html>
            <head>
            <style>
            *{
            color: black;
            }    
            h4{
                    color: rgb(68, 68, 68);
            }
            </style>
            </head>
            <body>
            <h1>Restablecimiento de contraseña</h1>
            
            Recientemente nos ha llegado una solicitud para un restablecimiento de contraseña,<br>
            utiliza el siguiente codigo: <b>'. $codigo .'</b><br>
            Si no has sido tú, contactate al siguiente correo servicioSaborT@gmail.com
            </body>
            </html>
            ';
            

            $mail->send();
            $_SESSION["tiempo"]=time();
            $_SESSION['exito']="Mensaje enviado con éxito";
            
        } catch (Exception $e) {
            $_SESSION['mensaje']="El mensaje no se pudo enviar";
        }
    }
}