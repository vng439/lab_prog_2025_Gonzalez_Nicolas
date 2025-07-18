<?php

namespace app\core\controllers;

use app\core\services\AuthenticationService;
use app\core\controllers\base\BaseController;
use app\core\models\dto\LoginDTO;
use app\libs\http\Request;
use app\libs\http\Response;


final class AuthenticationController extends BaseController{

    public function index(Request $request, Response $response): void{
        if (isset($_SESSION["usuario"])) {
            header("Location: " . APP_URL . "home/index");
            return;
        }

        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        require_once APP_FILE_LOGIN;
    }

    public function login(Request $request, Response $response): void {
    $data = $request->getDataFromInput();

    if (!is_array($data) || empty($data['userName']) || empty($data['password'])) {

        $response->setStatus(400); // Bad Request
        $response->setMessage([
            "success" => false,
            "message" => "Faltan datos para iniciar sesión."
        ]);
        $response->send();
        return;
    }
    $dto = new LoginDto($data);

    $service = new AuthenticationService();
    $service->login($dto);

    $response->setMessage([
        "success" => true,
        "message" => "Login exitoso",
        "usuario" => $_SESSION["usuario"] ?? null,
        "perfil" => $_SESSION["perfil"] ?? null
    ]);
    $response->send();
}

    public function logout(Request $request, Response $response): void{
        $service = new AuthenticationService();
        $service->logout();
        $this->setCurrentView($request);
        header("refresh:5;url=" . APP_URL . "authentication/index");
        require_once APP_FILE_LOGOUT;
    }

}


