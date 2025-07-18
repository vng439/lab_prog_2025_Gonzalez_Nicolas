<?php

namespace app;

use app\libs\pipeline\Pipeline;
use app\libs\http\Request;
use app\libs\http\Response;
use app\libs\pipeline\middlewares\ExceptionHandlerMiddleware;
use app\libs\pipeline\middlewares\RouterHandlerMiddleware;
use app\libs\pipeline\middlewares\AuthenticationMiddleware;
use app\libs\pipeline\middlewares\PerfilMiddleware;



final class App{

    private function __construct(){}

    public static function run(){

        $pipeline = new Pipeline();

        $pipeline
        ->pipe(new ExceptionHandlerMiddleware())
        ->pipe(new AuthenticationMiddleware())
        ->pipe(new RouterHandlerMiddleware());

        $pipeline->process(new Request(), new Response()); //NEW REQUEST CAPTURA LA PETICION. Y EL RESPONSE YA MANDA UN RESPONSE. ES EL UNICO QUE SE VA ANALIZANDO O 
       // "PASEANDO" POR LOS MIDDLEWARE;

    }

}