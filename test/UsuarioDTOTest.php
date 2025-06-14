<?php
use app\core\models\dto\UsuarioDTO;

require_once '../app/core/models/dto/base/InterfaceDTO.php';
require_once "../app/core/models/dto/UsuarioDTO.php";


$peticionCliente = '{
    "id": 2 , "apellido": "Gonzalez", "nombres": "Victor Nicolás", "cuenta" : "vnicolasg", "perfil" : 1, "clave" : "1234" , "correo": "vnicolasg@gmail.com" , "estado" : 1, "fechaAlta" : "06-06-2025"
}';

$data = json_decode($peticionCliente, true);

$usuario = new UsuarioDTO($data);

print_r ($usuario ->toArray());