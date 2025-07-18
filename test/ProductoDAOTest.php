<?php

require_once '../app/core/models/dao/base/InterfaceDAO.php';
require_once '../app/core/models/dao/base/DAO.php';
require_once '../app/core/models/dao/ProductoDAO.php';
require_once "../app/config/DBConfig.php";
require_once "../app/libs/database/Connection.php";
require_once '../app/core/models/dto/base/InterfaceDTO.php';
require_once '../app/core/models/dto/ProductoDTO.php';

use app\libs\database\Connection;
use app\core\models\dto\ProductoDTO;
use app\core\models\dao\ProductoDAO;


try{
/*     $data = ["id" => 0, 
    "nombre" => "Guitarra", 
    "codigo" => "002", 
    "descripcion" => "Instrumento de Viento",
    "categoriaId" => 2, 
    "precio" => 2500.00, 
    "stock" => 2];

    $dto = new ProductoDTO($data);
 */
    $dao = new ProductoDAO(Connection::get());
    $ver = $dao->list([]);

    print_r($ver);
    
}

catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
    
}