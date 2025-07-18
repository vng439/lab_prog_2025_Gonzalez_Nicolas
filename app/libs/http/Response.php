<?php

namespace app\libs\http;

final class Response {
    //METODOS COMPORTAMIENTOS DE LA PETICIÓN HTTP. 
    //POR LO GENERAL, EN LOS FRAMEWORKS DE PHP SE TRABAJA COMO ESTAMOS VIENDO EN RESPONSE Y REQUEST

    private $controller, $action, $error, $message, $result;
    //DEFINIMOS VARIABLES PARA MANTENER VALORES DE ESTADO. CONTROLADOR, ACCION, ERRORES, MENSAJES Y RESULTADOS EN CASO DE QUE TENGAMOS QUE ENVIAR VALORES DE NUEVO X EJ USUARIOS CON EL ID 10

    //ESTE RESPONSE TIENE QUE TNENER UN METODO PARA QUE DEVUELVE LOS DATOS COMO JSON PORQUE ESO ESTA ESPERANDO

    public function __construct(){
        $this->setController("");
        $this->setAction("");
        $this->setError("");
        $this->setMessage("");
        $this->setResult([]);
    }

    public function setController($controller): void{
        $this->controller = $controller;
    }   

    public function setAction($action): void{
        $this->action = $action;
    }

     public function setError($error): void{
        $this->error = $error;
    }

     public function setMessage($message): void{
        $this->message = $message;
    }

     public function setResult($result): void{
        $this->result = $result;
    }


    public function send() :void{
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode([
            "controller"    => $this->controller,
            "action"        => $this->action,
            "error"         => $this->error,
            "message"       => $this->message,
            "result"        => $this->result,
        ]);
    }
}