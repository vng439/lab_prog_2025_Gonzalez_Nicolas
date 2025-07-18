<?php

namespace app\core\services;

use app\core\models\dao\UsuarioDAO;
use app\core\models\dto\base\InterfaceDTO;
use app\core\models\dto\UsuarioDTO;
use app\core\services\base\InterfaceService;
use app\libs\database\Connection;


final class UsuarioService implements InterfaceService{

    public function save(InterfaceDTO $dto): void{

        $this->validate($dto);
        $data = $dto->toArray();
        unset($data["id"]); //si pasamos $data en el DAO en vez de los valores específicos, 
        $dao = new UsuarioDAO(Connection::get());
        $dao->save($data);
    }

    public function load(int $id): InterfaceDTO{
        
        $dao = new UsuarioDAO(Connection::get());
        return new UsuarioDTO($dao->load($id));
    }

    public function update(InterfaceDTO $dto): void{
        
        $this->validate($dto);
        $dao = new UsuarioDAO(Connection::get());
        $data = $dto->toArray(); 
        unset($data["clave"]);
        $dao->update($data);
    }   

    public function delete(InterfaceDTO $dto): void{

        $dao = new UsuarioDAO(Connection::get());
        $dao->delete($dto->getId());
    }

    public function list(array $filters): array{
    
        $dao = new UsuarioDAO(Connection::get());
        $filtros = $dao->list($filters);
        $result = [];

        foreach($filtros as $filtro){
                $result[] = new UsuarioDTO($filtro);
            }
            return $result;
    }



    private function validate(UsuarioDTO $dto): void{

         if($dto->getApellido() == ""){
            throw new \Exception("<p>El <strong>apellido</strong> del usuario es obligatorio </p>");
        }
        if($dto->getNombres() == ""){
            throw new \Exception("<p>El <strong>nombre</strong> del usuario es obligatorio </p>");
        }
        if($dto->getCuenta() == ""){
            throw new \Exception("<p>La <strong>cuenta</strong> del usuario es obligatorio </p>");
        }
        if($dto->getPerfil() == ""){
            throw new \Exception("<p>El <strong>perfil</strong> del usuario es obligatorio </p>");
        }
        if($dto->getClave() == ""){
            throw new \Exception("<p>La <strong>clave</strong> del usuario es obligatoria </p>");
        }
        if($dto->getCorreo() == ""){
            throw new \Exception("<p>El <strong>correo</strong> del usuario es obligatorio </p>");
        }
        if($dto->getEstado() == ""){
            throw new \Exception("<p>El <strong>estado</strong> del usuario es obligatorio </p>");
        }

        
    }

    public function enable(int $id): void{
        $sql = "UPDATE {$this->table} SET estado = 1 WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => "id"]);

    }

    public function disable(int $id): void{
        $sql = "UPDATE {$this->table} SET estado = 0 WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => "id"]);
    }

    public function reset(int $id): void{

        $sql = "UPDATE {$this->table} SET resetPass = 1 WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => "id"]);
    }
}