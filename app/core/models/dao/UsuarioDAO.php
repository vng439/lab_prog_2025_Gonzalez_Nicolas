<?php

namespace app\core\models\dao;

use app\core\models\dao\base\InterfaceDAO;
use app\core\models\dao\base\DAO;


final class UsuarioDAO extends DAO implements InterfaceDAO{


    public function __construct(\PDO $connection){
        parent::__construct($connection, "usuarios");

    }

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES (DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, :estado, :fechaAlta)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "apellido" => $data["apellido"],
            "nombres" => $data["nombres"],
            "cuenta" => $data["cuenta"],
            "perfil" => $data["perfil"],
            "clave" => $data["clave"],
            "correo" => $data["correo"],
            "estado" => $data["estado"],
            "fechaAlta" => $data["fechaAlta"],
        ]);

    }

    public function load(int $id): array{
        return $stmt->fetch(\PDO::FETCH);
    }

    public function update (array $data): void{

    }

    public function delete (int $id): void{

    }

    public function list(array $filters): array{

    }

    public function suggestive(array $filters): array{
        
    }

    public function returnRows(): int{
        return 0;
    }

    public function getLastInsertId(): int{
        return 0;
    }

}







