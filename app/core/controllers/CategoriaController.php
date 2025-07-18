<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\core\models\dto\CategoriaDTO;
use app\core\services\CategoriaService;
use app\libs\http\Request;
use app\libs\http\Response;

final class CategoriaController extends BaseController implements InterfaceController{


    //metodos del cliente al servidor
    //metodos del servidor al cliente

    //servidor => cliente son metodos que venimos trabajando que se encuentran en el DAO.

    
    public function index(Request $request, Response $response): void{ //EN CASO DE DEVOLVER ALGO, SE HACE DESDE EL RESPONSE
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");     
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;
    }

    public function load(Request $request, Response $response): void{

        $service = new CategoriaService();
        $dto = $service->load((int)$request->getId());
        $response->setResult($dto->toArray());
        $response->send();

    }

    public function create(Request $request, Response $response): void{

        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;

    }

    public function save(Request $request, Response $response): void{

        $service = new CategoriaService();
        $dto = new CategoriaDTO($request->getDataFromInput());
        $service->save($dto);
        $response->setMessage("<p> Se agregó una nueva categoría al sistema. </p>");
        $response->send();

    }

    public function edit(Request $request, Response $response): void{

        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;

    }

    public function update(Request $request, Response $response): void{

        $service = new CategoriaService();
        $dto = new CategoriaDTO($request->getDataFromInput());
        $service->update($dto);
        $response->setMessage("<p> Se actualizó el registro {$dto->getNombre()} de la tabla categoría satisfactoriamente. </p>");
        $response->send();
    }

    public function delete(Request $request, Response $response): void{

        $service = new CategoriaService();
        $dto = new CategoriaDTO($request->getDataFromInput());
        $service->delete($dto);
        $response->setMessage("<p> Se eliminó el ID: {$dto->getId()} de la tabla categoría satisfactoriamente. </p>");
        $response->send();

    }

    public function list(Request $request, Response $response): void{

    $service = new CategoriaService();
    $dto = new CategoriaDTO($request->getDataFromInput());
    $filtros = $service->list([]);

    $result = [];

    foreach ($filtros as $encontrado) {
        $result[] = $encontrado->toArray();
    }
    $response->setMessage($result);
    $response->send();

    }

}