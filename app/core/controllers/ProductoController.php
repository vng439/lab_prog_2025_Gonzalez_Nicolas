<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\controllers\base\InterfaceController;
use app\core\services\ProductoService;
use app\core\models\dto\ProductoDTO;
use app\libs\http\Request;
use app\libs\http\Response;



final class ProductoController extends BaseController implements InterfaceController{

public function index(Request $request, Response $response): void{ //EN CASO DE DEVOLVER ALGO, SE HACE DESDE EL RESPONSE
        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");     
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;
    }

    public function load(Request $request, Response $response): void{

        $service = new ProductoService();
        $dto = $service->load($request->getId());
        $response->setResult($dto->toArray());
        $response->send();
    }

    public function create(Request $request, Response $response): void{

        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");     
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;

    }

    public function save(Request $request, Response $response): void{

        $dto = new ProductoDTO($request->getDataFromInput());
        $service = new ProductoService();
        $service->save($dto);

        $response->setMessage("<p> Se agregó un nuevo producto al sistema. </p>");

        $response->send();

    }

    public function edit(Request $request, Response $response): void{

        array_push($this->scripts, "app/js/{$request->getController()}/{$request->getAction()}.js");     
        $this->setCurrentView($request);
        require_once APP_FILE_TEMPLATE;
    }

    public function update(Request $request, Response $response): void{

        $service = new ProductoService();
        $dto = new ProductoDTO($request->getDataFromInput());
        $service->update($dto);
        $response->setMessage("<p> Se actualizó el registro {$dto->getNombre()} de la tabla productos satisfactoriamente. </p>");
        $response->send();
    }

    public function delete(Request $request, Response $response): void{

        $service = new ProductoService();
        $dto = new ProductoDTO($request->getDataFromInput());
        $service->delete($dto);
        $response->setMessage("<p> Se eliminó el ID: {$dto->getId()} de la tabla productos satisfactoriamente. </p>");
        $response->send();
    }

    public function list(Request $request, Response $response): void{

        $service = new ProductoService();
        $filters = $request->getDataFromInput();
        $arrayDtos = $service->list($filters);
        $result = array_map(fn($dto) => $dto->toArray(), $arrayDtos);

        $response->setResult($result);
        $response->send();

    }


}