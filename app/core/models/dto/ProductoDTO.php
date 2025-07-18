<?php

namespace app\core\models\dto;
use app\core\models\dto\base\InterfaceDTO;

final class ProductoDTO implements InterfaceDTO{

    /* VARIABLES DE LA TABLA PRODUCTOS */
    private $id, $nombre, $codigo, $descripcion, $categoriaId, $precio, $stock;


    /* CONSTRUCTOR DE LA CLASE */

    public function __construct(array $data = [] ){

        $this->setId($data["id"] ?? 0);
        $this->setNombre($data["nombre"] ?? "");
        $this->setCodigo($data["codigo"] ?? "");
        $this->setDescripcion($data["descripcion"] ?? "");
        $this->setCategoriaId($data["categoriaId"] ?? 0);
        $this->setPrecio($data["precio"] ?? 0.0);
        $this->setStock($data["stock"] ?? 0);

    }


    /* GETTERS */

    public function getId(): int{
        return $this->id;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function getCodigo(): string{
        return $this->codigo;
    }

    public function getDescripcion(): string{
        return $this->descripcion;
    }

    public function getCategoriaId(): int{
        return $this->categoriaId;
    }

    public function getPrecio(): float{
        return $this->precio;
    }

    public function getStock(): int{
        return $this->stock;
    }


    /* SETTERS */


    public function setId(int $id): void{
        $this->id = (is_integer($id) && $id > 0) ? $id : 0;
    }

    public function setNombre(string $nombre){
        $this->nombre = 
        is_string($nombre) && (strlen(trim($nombre)) <= 45) ? trim($nombre) : "";
    }

    public function setCodigo(string $codigo){
        $this->codigo =
        is_string($codigo) && (strlen(trim($codigo)) <= 25) ? $codigo : "";
    }

    public function setDescripcion(string $descripcion){
        $this->descripcion = is_string($descripcion) ? $descripcion : "";
    }

    public function setCategoriaId(int $categoriaId){
        $this->categoriaId = is_integer($categoriaId) ? $categoriaId : 0;
    }

    public function setPrecio(float $precio): void{
        $this->precio = is_float($precio) ? $precio : 0;   
    }

    public function setStock(int $stock){
        $this->stock = is_integer($stock) ? $stock : 0;
    }
    

    public function toArray(): array{
        return [
            "id"                => $this->getId(),
            "nombre"            => $this->getNombre(),
            "codigo"            => $this->getCodigo(),
            "descripcion"       => $this->getDescripcion(),
            "categoriaId"       => $this->getCategoriaId(),
            "precio"            => $this->getPrecio(),
            "stock"             => $this->getStock()
        ];
    }


}