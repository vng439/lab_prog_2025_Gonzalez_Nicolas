<?php

require_once '../app/core/models/dao/base/InterfaceDAO.php';
require_once '../app/core/models/dao/base/DAO.php';
require_once '../app/core/models/dao/UsuarioDAO.php';
require_once "../app/config/DBConfig.php";
require_once "../app/libs/database/Connection.php";
require_once '../app/core/models/dto/base/InterfaceDTO.php';
require_once '../app/core/models/dto/UsuarioDTO.php';

use app\libs\database\Connection;
use app\core\models\dto\UsuarioDTO;
use app\core\models\dao\UsuarioDAO;

try{
    

    $dao = new UsuarioDAO(Connection::get());
    print_r ($dao->list(["estado" => 0]));
    
}
catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
}
