<?php

require_once "../app/config/DBConfig.php";
require_once "../app/config/AppConfig.php";
require_once "../app/vendor/autoload.php";

use app\core\models\dto\ProductoDTO;
use app\core\services\ProductoService;


try{

   /*  $data = ["id" => 0, "nombre" => "Categoria de Prueba Service"];
    $dto = new CategoriaDTO($data); */

    $service = new ProductoService();

    $dato = $service->load(2);

    print_r ($dato);
    
}


catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
    
}

catch(\Exception $ex){
    echo "Error sistema => " . $ex->getMessage();
    
}