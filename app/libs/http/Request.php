<?php

namespace app\libs\http;

final class Request{
    
    private $controller, $action; //NECESITAMOS GUARDAR INFORMACIÓN SOBRE EL CONTROLADOR Y LA ACCION

    //REQUEST TIENE QUE VER CON LA PETICIÓN DEL CLIENTE. DESDE AHI VIENE QUE ACCIÓN Y CONTROLADOR SE QUIERE REALIZAR.

//CREAMOS UN CONSTRUCTOR. A PENAS SE ISNTANCIA ESE TIPO DE OBJETO Y CAPTURAMOS LA ACCIÓN Y EL CONTROLADOR.

//TODAS LAS PETICIONES TIENEN QUE TENER UNA ACCIÓN Y CONTROLADOR. SI NO LOS TIENE, SE PAAS ALGUN VALOR POR DEFECTO PARA SACARLO DEL SITIO.

    public function __construct(){

        $this->setController($_GET["controller"] ?? APP_DEFAULT_CONTROLLER);
        $this->setAction($_GET["action"] ?? APP_DEFAULT_ACTION);
    }

    public function getMethod(): string{
        return $_SERVER["REQUEST_METHOD"]; //RETORNA INFORMACIÓN DEL SERVIDOR Y DEL CLIENTE. DEVUELVE INFORMACIÓN DE LA VARIABLE GLOBAL SOLO EL REQUEST. 
        //DEVUELVE EL METODO DE LA ACCIÓN DEL CLIENTE GET POST DELETE PETICIONES HTTP. EN NUESTRO CASO SÓLO DEVUELVE GET O POST
    }

    public function getController(): ?string{
        return $this->controller;
    }

    public function setController(?string $controller): void{
        $this->controller = $controller;
    }

    public function setAction(?string $action): void {
        $this->action = $action;
    }

    public function getAction(): ?string{
        return $this->action;
    }

    public function getId(): ?string{
        return $this->getParameterValue("id", null);
    } 

    public function getDataFromInput(): ?array{
        return json_decode(file_get_contents("php://input"), true); //BUFFER DE ENTRADA DE PHP. ES UN ARCHIVO TEMPORAL QUE MANEJA EL SERVIDOR. SE ACCEDE CON LA DIRECTIVA PHP://INPUT
        //FILE GET CONTENTS - LEE TODO EL ARCHIVO CONTENIDO. ES UNA FUNCIÓN PHP. LEE TODO LA INFORMACIÓN DE ENTRADA. TRANSFORMA A UN ARRAY. ESTE METODO NOS SIRVE PARA TRANSFORMAR EN UN JSON ARRAY
        //BUFFER ES UN ARCHIVO DE TEXTO PLANO. TODO EL CONTENIDO DEL ARCHIVO SE CONVIERTE EN JSON Y APLICAMOS EL VALOR TRUE PARA QUE EN VEZ DE LLAVES, PONGA CORCHETES POR LO QUE QUEDA UN ARRAY.
    }


    public function getParameterValue(string $paramName, ?string $defaultValue) : ?string{

        $value = null;

        switch($this->getMethod()){

            case "GET" : 
                $value = $_GET[$paramName] ?? $defaultValue;
            break;

            case "POST" : $value = $_POST[$paramName] ?? $defaultValue;
            break;

            }
        return $value;
        }
}
