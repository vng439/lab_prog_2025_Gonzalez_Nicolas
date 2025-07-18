<?php

namespace app\libs\pipeline\middlewares;

use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\pipeline\middlewares\base\BaseMiddleware;
use app\libs\http\Request;
use app\libs\http\Response;

final class RouterHandlerMiddleware extends BaseMiddleware implements InterfaceMiddleware{

    public function __construct(){

        parent::__construct();
    }

    //MIDDLEWARE QUE MANEJA EL ENRUTAMIENTO DE LAS ACCIONES => HACIA DONDE VA

    
    public function process(Request $request, Response $response): void{

        //TOMA EL CONTROLADOR Y LA ACCIÓN DEL REQUEST Y TRATA DE FORMA DINAMICA INSTANCIAR UN OBJETO DE ESE CONTROLADOR Y EJECUTAR EL METODO DE LA ACCION

            //QUEREMOS SABER EL METODO 

        $controller = ucfirst($request->getController()) . "Controller"; //CONCATENA CATEGORIA CON CONTROLLER => CategoriaController
        $controller = 'app\\core\\controllers\\' . $controller; //CONCATENA A LA IZQ EL NAMESPACE

        if(!class_exists($controller) || !method_exists($controller, $request->getAction())){

            throw new \Exception("Controlador y - o accion incorrectos ({$request->getController()} => {$request->getAction()})");

            //CHEQUEA QUE EL CONTROLLER EXISTA Y EL METODO TAMB
        }

        $response->setController($request->getController());
        $response->setAction($request->getAction());

        call_user_func_array( //INSTANCIA UN OBJETO Y LLAMA AL METODO QUE DECLAREMOS. CREA UN OBJETO DE TIPO CONTROLLER Y AUTOMÁTICAMENTE LLAMA 
        // AL MÉTODO ACCION Y SE LE PASAN LOS PARÁMETROS. NEW CONTROLLER, LLAMAR AL METODO, SE LE PASA REQ Y RESPONSE
            array(new $controller, $request->getAction()),
            array($request, $response)
        );

    }

}