<?php

require_once "../app/core/models/enums/PerfilUsuarioEnum.php";

use app\core\models\enums\PerfilUsuarioEnum;


echo PerfilUsuarioEnum::ADMINISTRADOR->value;

?>

<select>

<option value="">Seleccione..</option>

<?php 

    foreach(PerfilUsuarioEnum::cases() as $perfil){
        echo "<option value=\"{$perfil->value}\"> {$perfil->value} </option>"; 
    }