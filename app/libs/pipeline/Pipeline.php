<?php

namespace app\libs\pipeline;

use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\http\Request;
use app\libs\http\Response;

final class Pipeline{

    private ?InterfaceMiddleware $first;
    private ?InterfaceMiddleware $last;

    public function __construct(){
        $this->first = $this->last = null;
    }

    //MANEJAN EL TRÁFICO DE RESPUESTAS Y SOLICITUDES. TRÁFICO DE INFORMACIÓN.
 
    public function pipe(?InterfaceMiddleware $middleware){ //AGREGAR UN NUEVO PIPELINE
        if($this->first == null){
            $this->first = $this->last = $middleware; //SI ESTA VACIO, ESTE MIDDLEWARE PASA A SER PRIMERO Y ULTIMO
        }
        else{
            $this->last->setNext($middleware); //SINO ESTA VACIO, ES EL PROXIMO
            $this->last = $middleware;
        }

        return $this;
    }

    public function process(Request $request, Response $response){
        if($this->first != null){
            $this->first->process($request, $response);
        }
    }

}