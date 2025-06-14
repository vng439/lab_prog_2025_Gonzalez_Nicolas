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
    
    $data = ["id" => 0, 
    "apellido" => "Gonzalez", 
    "nombres" => "Victor Nicolás", 
    "cuenta" => "vnicolasg", 
    "perfil" => 1,  
    "clave" => "prueba123", 
    "correo" => "nico@gmail.com", 
    "estado" => 1, 
    "fechaAlta" => "14-06-2025", 
    "resetPass" => 0];

    $dto = new UsuarioDTO($data);

    $dao = new UsuarioDAO(Connection::get());
    $dao->save($dto->toArray());
    
}
catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
}
