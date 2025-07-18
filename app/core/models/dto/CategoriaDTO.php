<?php

namespace app\core\models\dto;

use app\core\models\dto\base\InterfaceDTO;

final class CategoriaDTO implements InterfaceDTO{

    //definir los campos de la tabla

    private $id, $nombre; //campos de la tabla categoría

    public function __construct (array $data = []){
        $this->setId($data["id"] ?? 0);
        $this->setNombre($data["nombre"] ?? "");
    }

    public function getId(): int{
        return $this->id;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function setId(int $id): void{
        $this->id = (is_integer($id) && $id > 0) ? $id : 0;
    }

    public function setNombre(string $nombre){
        $this->nombre = 
        is_string($nombre) && (strlen(trim($nombre)) <= 100) ? $nombre : "";
    }

    public function toArray(): array {
        return [
            "id" => $this->getId(),
            "nombre" => $this->getNombre()
        ];

        //ESTE METODO PUEDE SER EQUIVALENTE AL TOSTRING DE JAVA
    }
}

//EL DTO SE COMPONE DE GETTERS SETTERS Y TO ARRAY