<?php

namespace app\libs\pipeline\middlewares;

use app\libs\database\Connection;
use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\pipeline\middlewares\base\BaseMiddleware;
use app\libs\http\Request;
use app\libs\http\Response;

final class ExceptionHandlerMiddleware extends BaseMiddleware implements InterfaceMiddleware{

    public function __construct(){
        
        parent::__construct();
    }

    //MIDDLEWARE QUE MANEJA LAS EXCEPCIONES DE LAS ACCIONES => HACIA DONDE VA

    public function process(Request $request, Response $response): void{
        try{
            $this->processNext($request, $response);
            
        }
        catch(\PDOException $ex){

            $conn = Connection::get();
            $response->setMessage("");
            $response->setError("Error Interno. Consulte con el administrador del sistema");
            $response->send();
        }

        catch(\Exception $ex){

            $conn = Connection::get();
            $response->setMessage("");
            $response->setError("{$ex->getMessage()}");
            $response->send();
        }
    }

}