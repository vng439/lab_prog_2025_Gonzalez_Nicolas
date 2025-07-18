<?php

namespace app\libs\pipeline\middlewares\base;

use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\http\Request;
use app\libs\http\Response;

class BaseMiddleware{

    protected ?InterfaceMiddleware $next;


    public function __construct(){
    
        $this->next = null; //no va a tener siguiente el proximo. se setea en null
    }

    public function setNext(InterfaceMiddleware $middleware): void{ //setea el prox. Recibe un middleware y concluimos que ese middleware va a ser el próximo.
    
        $this->next = $middleware;
    }
    
    public function processNext(Request $request, Response $response): void{ //
    
        if($this->next != null){
    
            $this->next->process($request, $response); //pregunta si el prox es distinto de nulo entonces lo procesa. 
    }
 }
}