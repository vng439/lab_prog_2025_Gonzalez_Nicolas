<?php
use app\core\models\dto\CategoriaDTO;

require_once '../app/core/models/dto/base/InterfaceDTO.php';
require_once "../app/core/models/dto/categoriaDTO.php";


$peticionCliente = '{
    "id": 4 , "nombre": "Juguetes"
}';

$data = json_decode($peticionCliente, true);

$categoria = new categoriaDTO($data);

print_r ($categoria ->toArray());