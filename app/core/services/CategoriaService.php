<?php

namespace app\core\services;

use app\core\models\dao\CategoriaDAO;
use app\core\models\dto\base\InterfaceDTO;
use app\core\models\dto\CategoriaDTO;
use app\core\services\base\InterfaceService;
use app\libs\database\Connection;


final class CategoriaService implements InterfaceService{

    //EL SERVICE IMPLEMENTA METODOS QUE HAY EN EL DAO PERO LO HACE UTILIZANDO UN DTO.
    //CONNECTION => CONEXIÓN CON LA BASE DE DATOS
    //SE ENLAZAN ELEMENTOS.

    public function save(InterfaceDTO $dto): void{

        $this->validate($dto);
        $data = $dto->toArray();
        unset($data["id"]); //si pasamos $data en el DAO en vez de los valores específicos, 
        $dao = new CategoriaDAO(Connection::get());
        $dao->save($data);

    }

    public function load(int $id): InterfaceDTO{
        $dao = new CategoriaDAO(Connection::get());
        return new CategoriaDTO($dao->load($id));
    }

    public function update(InterfaceDTO $dto): void{
    
        $this->validate($dto);
        $dao = new CategoriaDAO(Connection::get());
        $dao->update($dto->toArray());
    }

    public function delete(InterfaceDTO $dto): void{
        $dao = new CategoriaDAO(Connection::get());
        $dao->delete($dto->getId());
    }

    public function list(array $filters): array{

        $dao = new CategoriaDAO(Connection::get());
        $filtros = $dao->list($filters);

        $result = [];

        foreach($filtros as $filtro){
            $result[] = new CategoriaDTO($filtro);
        }
        return $result;
    }

    private function validate(CategoriaDTO $dto): void{

        if($dto->getNombre() ==""){
            throw new \Exception("<p>El <strong>nombre</strong> de la categoria es obligatorio </p>");
        }
    }
}