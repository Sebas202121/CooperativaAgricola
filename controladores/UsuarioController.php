<?php

require_once "modelos/Usuario.php";

class UsuarioController{

    public function guardar(String $username, String $email, String $password){
        $usuario = new Usuario();
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $usuario->guardar($username, $email, $password);
    }

    public function login(String $username, String $password){
        $usuario = new Usuario();
        $respuesta = $usuario->validarUsuario($username, $password);
        $contador = 0;
        $passwordBd = null;
        foreach($respuesta as $usuario){
            $passwordBd = $usuario["password"];
            $id = $usuario["id"];
            $username = $usuario["username"];
            $contador++;
        }
        if($contador>0){
            if($passwordBd != null && password_verify($password, $passwordBd)){
                session_start();
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                header("location: bienvenido.php");
            }else{
                echo "Usuario y/o contraseña incorrectos";
            }
        }else{
            echo "Usuario y/o contraseña incorrectos";
        }
    }
}