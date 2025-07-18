<?php

namespace app\core\services;

use app\core\models\dto\LoginDto;
use app\libs\database\Connection;
use app\core\models\dao\UsuarioDAO;

final class AuthenticationService{

    public function login(LoginDto $login): void{

        $conn = Connection::get();
        $usuarioDAO = new UsuarioDAO($conn);
        $usuario = $usuarioDAO->login($login->getUserName());

        if(!password_verify($login->getPassword(), $usuario["clave"])){
            throw new \Exception ("El Usuario o la clave es incorrecta.");
        }

        if($usuario["estado"] !== 1){
            throw new \Exception ("Cuenta Inactiva. Contacte al administrador del sistema");
        }

        if ($usuario["resetPass"] !== 0) {
            throw new \Exception("Su clave ha caducado");
        }

        $_SESSION["token"] = APP_TOKEN;

        $_SESSION["usuario"] = $usuario["nombres"];
        $_SESSION["perfil"] = $usuario["perfil"];
        $_SESSION["usuarioId"] = (int)$usuario["id"];
        $_SESSION["cuenta"] = $usuario["cuenta"];
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["apellido"] = $usuario["apellido"];
        $_SESSION["fechaAlta"] = $usuario["fechaAlta"];
        
    }

    public function logout(): void{

        session_unset();

        if (ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"],
            $params["domain"], $params["secure"], $params["httponly"]);
        }

        session_destroy();
    }
}