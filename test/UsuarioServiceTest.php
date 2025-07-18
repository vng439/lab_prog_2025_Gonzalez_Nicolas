<?php

require_once "../app/config/DBConfig.php";
require_once "../app/config/AppConfig.php";
require_once "../app/vendor/autoload.php";

use app\core\models\dto\UsuarioDTO;
use app\core\services\UsuarioService;

try{

    /*
    $data = ["id" => 0, "apellido" => "Gonzalez", "nombres" => "Victor Nicolas", "cuenta" => "nicolas123", "perfil" => 2 , "clave" => "nicolas123", "correo" => "nicolas123@gmail.com", "estado" => 0, "resetPass" => 0];
    $dto = new UsuarioDTO($data);

    $service = new UsuarioService();

    $service->save($dto);
    
    echo "se guardó un nuevo usuario en el sistema"; 

    */

    $service = new UsuarioService();
    $usuario = $service->load(22);

    $usuario->setApellido("Perro");
    $usuario->setNombres("Marco");
    $usuario->setPerfil("Operador");
    $usuario->setClave("1234567");

    echo $usuario->getNombres();

    $usuarios = $service->list(["perfil" => "Operador"]);
    echo "<p>✔ Usuarios actuales:</p><ul>";
    foreach ($usuarios as $u) {
        echo "<li>ID: {$u->getId()} | Cuenta: {$u->getCuenta()} | Correo: {$u->getCorreo()}</li>";
    }
    echo "</ul>";


    /* echo "<p>✔ Usuario cargado por ID {20}: {$dto->getNombres()} {$dto->getApellido()}</p>";

    echo $dto->getId();  */

    $service->update($usuario);
 
    


    /* $usuario = $service->load(17);
    echo "<p>✔ Usuario cargado por ID {1}: {$usuario->getNombres()} {$usuario->getApellido()}</p>"; */
   

 

}


catch(\PDOException $ex){
    echo "Error database => " . $ex->getMessage();
    
}

catch(\Exception $ex){
    echo "Error sistema => " . $ex->getMessage();
    
}