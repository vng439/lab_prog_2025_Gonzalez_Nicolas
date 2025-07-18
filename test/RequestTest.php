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


    $dto = new CategoriaDTO($request->getDataFromInput());
    $service = new CategoriaService();
    $service->save($dto);

    $response->setMessage("<p> se agregó una nueva categoría al sistema. </p>");

    $response->send(); //ESTE SEND ES CUANDO FUNCIONÓ TODO. LOS QUE SE ENCUENTRAN EN EL CATCH SON PARA CONTEMPLAR LOS ERRORES. 

    // CON ESTO EVITAMOS NO CONTEMPLAMOS TODOS LOS CAMINOS.


   /*
    print_r($request->getDataFromInput()); //SI DEVUELVE NULL, ES PORQUE NO HAY NADA EN EL BUFFER.

    print_r($_POST); //NAME CON EL DATO VALOR. nombre => valor del input;


    $data = ["id" => 0, "nombre" => "Categoria de Prueba Service"];
    $dto = new CategoriaDTO($data);

    $service = new CategoriaService();
    $service->save($dto);
    
    echo "se guardó una nueva categoria en el sistema"; */
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