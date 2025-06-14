<?php 
namespace app\core\models\dto\base; //como paquetes de JAVA


interface InterfaceDTO{

    /** devuelve un arreglo con todos los campos de la tabla  
    * @return array Arreglo con los campos de la tabla
    */

    public function toArray(): array;


}