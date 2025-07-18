<?php

namespace app\libs\pipeline\middlewares;

use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\pipeline\middlewares\base\BaseMiddleware;
use app\libs\http\Request;
use app\libs\http\Response;


final class AuthenticationMiddleware extends BaseMiddleware implements InterfaceMiddleware{

    public function __construct(){
        
        parent::__construct();
    }

    public function process(Request $request, Response $response): void {
        
        session_start();
    
        if(!isset($_SESSION["token"]) || ($_SESSION["token"] != APP_TOKEN)) {
            $request->setController(APP_AUTHENTICATION_CONTROLLER);
            if($request->getAction() != APP_LOGIN_ACTION){
                $request->setAction(APP_DEFAULT_ACTION);
            }
        }

        $this->processNext($request, $response);
    }


    
}