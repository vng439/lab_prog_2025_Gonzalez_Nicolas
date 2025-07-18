<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\core\services\UsuarioService;
use app\core\models\dto\UsuarioDTO;
use app\libs\http\Request;
use app\libs\http\Response;


final class UsuarioController extends BaseController implements InterfaceController{

public function index(Request $request, Response $response): void{ //EN CASO DE DEVOLVER ALGO, SE HACE DESDE EL RESPONSE
    $this->requireAdmin();
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");

       /*$service = new CategoriaService();
        $categorias = $service->list([$request->getDataFromInput()]); */
        
        $this->setCurrentView($request);

        require_once APP_FILE_TEMPLATE;
    }

    public function load(Request $request, Response $response): void{
        $this->requireAdmin();
        $service = new UsuarioService();
        $dto = $service->load($request->getId());
        $response->setResult($dto->toArray());
        $response->send();
    }

    public function create(Request $request, Response $response): void{
        $this->requireAdmin();
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;

    }

    public function save(Request $request, Response $response): void{
        $this->requireAdmin();
        $dto = new UsuarioDTO($request->getDataFromInput());
        $service = new UsuarioService();
        $service->save($dto);

        $response->setMessage("<p> Se agregó un nuevo usuario al sistema. </p>");

        $response->send();

    }

    public function edit(Request $request, Response $response): void{
        $this->requireAdmin();
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;

    }

    public function update(Request $request, Response $response): void{
        $this->requireAdmin();
        $service = new UsuarioService();
        $dto = new UsuarioDTO($request->getDataFromInput());
        $service->update($dto);
        $response->setMessage("<p> Se actualizó el registro {$dto->getNombres()} de la tabla usuarios satisfactoriamente. </p>");
        $response->send();
    }

    public function delete(Request $request, Response $response): void{
        $this->requireAdmin();
        $service = new UsuarioService();
        $dto = new UsuarioDTO($request->getDataFromInput());
        $service->delete($dto);
        $response->setMessage("<p> Se eliminó el ID: {$dto->getId()} de la tabla usuarios satisfactoriamente. </p>");
        $response->send();
    }

    public function list(Request $request, Response $response): void{
        $this->requireAdmin();
        $service = new UsuarioService();
        $filters = $request->getDataFromInput();
        $arrayDtos = $service->list($filters);
        $result = array_map(fn($dto) => $dto->toArray(), $arrayDtos);

        $response->setResult($result);
        $response->send();

    }

    public function datos(Request $request, Response $response): void{
        
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;

    }

    protected function requireAdmin(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'Administrador') {
        http_response_code(403); 

        $this->view = "error/acceso_denegado.php"; 
        require_once APP_FILE_TEMPLATE; 

        exit; 
    }
}

    
} 
