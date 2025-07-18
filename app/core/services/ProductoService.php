<?php

namespace app\core\services;

use app\core\models\dao\ProductoDAO;
use app\core\models\dto\base\InterfaceDTO;
use app\core\models\dto\ProductoDTO;
use app\core\services\base\InterfaceService;
use app\libs\database\Connection;


final class ProductoService implements InterfaceService{

    public function save(InterfaceDTO $dto): void{

        $this->validate($dto);
        $data = $dto->toArray();
        unset($data["id"]); //si pasamos $data en el DAO en vez de los valores específicos, 
        $dao = new ProductoDAO(Connection::get());
        $dao->save($data);

    }

    public function load(int $id): InterfaceDTO{
        $dao = new ProductoDAO(Connection::get());
        return new ProductoDTO($dao->load($id));
    }

    public function update(InterfaceDTO $dto): void{
        $this->validate($dto);
        $dao = new ProductoDAO(Connection::get());
        $dao->update($dto->toArray());
    }

    public function delete(InterfaceDTO $dto): void{
        $dao = new ProductoDAO(Connection::get());
        $dao->delete($dto->getId());
    }

    public function list(array $filters): array{

        $dao = new ProductoDAO(Connection::get());
        $filtros = $dao->list($filters);
        $result = [];

        foreach($filtros as $filtro){
                $result[] = new ProductoDTO($filtro);
            }
            return $result;

    }
        
    /* public function list(array $filters): array{

    $dao = new ProductoDAO(Connection::get());

    $filtros = $dao->list($filters);
    $result = [];

    foreach ($filtros as $filtro) {
        $result[] = new ProductoDTO($filtro);
    }

    return $result;
    
    } */

    private function validate(ProductoDTO $dto): void{

        if($dto->getNombre() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoria es obligatorio </p>");
        }
        if($dto->getCodigo() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoria es obligatorio </p>");
        }
        if($dto->getDescripcion() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoria es obligatorio </p>");
        }
        if($dto->getCategoriaId() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoria es obligatorio </p>");
        }
        if($dto->getPrecio() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoria es obligatorio </p>");
        }
        
    }
}