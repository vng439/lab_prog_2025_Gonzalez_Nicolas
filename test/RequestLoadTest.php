<?php

require_once "../app/config/DBConfig.php";
require_once "../app/config/AppConfig.php";
require_once "../app/vendor/autoload.php";

use app\core\models\dto\CategoriaDTO;
use app\core\services\CategoriaService;
use app\libs\http\Request;
use app\libs\http\Response;

$response = new Response();

try{

    $request = new Request(); //contiene los datos de la petición. creamos un nuevo objeto request
    $response->setController($request->getController());
    $response->setAction($request->getAction());

    $data = $request->getDataFromInput();

    $service = new CategoriaService();
    
    $dto = $service->load($data["id"]);

    $response->setResult($dto->toArray());
    $response->send(); 

}


catch(\PDOException $ex){
    //echo "Error database => " . $ex->getMessage();

    $response->setError("Error database => " . $ex->getMessage());
    $response->send();
}

catch(\Exception $ex){
    //echo "Error sistema => " . $ex->getMessage();
    $response->setError("Error sistema => " . $ex->getMessage());
    $response->send();
}