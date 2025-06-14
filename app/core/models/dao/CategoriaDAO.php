<?php

namespace app\core\models\dao;

use app\core\models\dao\base\InterfaceDAO;
use app\core\models\dao\base\DAO;


final class CategoriaDAO extends DAO implements InterfaceDAO{


    public function __construct(\PDO $connection){
        parent::__construct($connection, "categorias");

    }

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES (DEFAULT, :nombre)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "nombre" => $data["nombre"],
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