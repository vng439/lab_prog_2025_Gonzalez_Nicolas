<?php

require_once "../app/config/DBConfig.php";
require_once "../app/config/AppConfig.php";
require_once "../app/vendor/autoload.php";

use app\core\models\dto\CategoriaDTO;
use app\core\services\CategoriaService;


try{

   /*  $data = ["id" => 0, "nombre" => "Categoria de Prueba Service"];
    $dto = new CategoriaDTO($data); */

    $service = new CategoriaService();

    $dato = $service->load(2);

    print_r ($dato);
    
}


catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
    
}

catch(\Exception $ex){
    echo "Error sistema => " . $ex->getMessage();
    
}