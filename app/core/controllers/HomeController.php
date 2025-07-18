<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\libs\http\Request;
use app\libs\http\Response;

final class HomeController extends BaseController{

    public function index(Request $request, Response $response): void{ //EN CASO DE DEVOLVER ALGO, SE HACE DESDE EL RESPONSE
        
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        
        $this->setCurrentView($request);

        require_once APP_FILE_TEMPLATE;
    }


}


