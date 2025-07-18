<?php

require_once '../app/core/models/dao/base/InterfaceDAO.php';
require_once '../app/core/models/dao/base/DAO.php';
require_once '../app/core/models/dao/CategoriaDAO.php';
require_once "../app/config/DBConfig.php";
require_once "../app/libs/database/Connection.php";
require_once '../app/core/models/dto/base/InterfaceDTO.php';
require_once '../app/core/models/dto/CategoriaDTO.php';

use app\libs\database\Connection;
use app\core\models\dto\CategoriaDTO;
use app\core\models\dao\CategoriaDAO;


try{
    
}

catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
    
}


/*
require_once '../app/core/models/dao/base/InterfaceDAO.php';  //TRAE LA INTERFAZ PARA REUTILIZARLA
require_once '../app/core/models/dao/base/DAO.php'; 
require_once '../app/core/models/dao/CategoriaDAO.php';

require_once '../app/core/models/dao/CategoriaDAO.php';

use app\core\models\dao\CategoriaDAO;
use app\core\models\dto\CategoriaDTO;
use app\libs\database\Connection;

/*$dao = new CategoriaDAO(null); //null para probar. 

print_r($dao->load(87)); 

try{
    $data = ["id" => 0, "nombre" => "CD"];
    $dto = new CategoriaDTO($data);

    $dao = new CategoriaDAO(Connection::get());

    $dao->save($dto->toArray());
}

catch(\PDOException $ex){
    echo "Error database => " .$ex->getMessage();
}

*/