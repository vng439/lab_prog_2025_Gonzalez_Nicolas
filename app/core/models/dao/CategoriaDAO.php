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

        $sql = "SELECT id, nombre FROM {$this->table} WHERE id = :id";
        /*$result = $this->selectQuery($sql, ["id" => $id]);
        if(count($result) == 0){
            throw new Exception("No se encontraron coincidencias para el identificador de la Categoria DAO");
        }
        return $result[0];*/
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);

        if($stmt->rowCount() == 0){
            throw new \Exception("<p>No se encontraron coincidencias para el identificador {$id} de la Categoria DAO </p>");
        }
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update (array $data): void{

        $sql = "UPDATE {$this->table} SET nombre = :nombre WHERE id = :id ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "id" => $data["id"],
            "nombre" => $data["nombre"]
            ]);        

    }

    public function delete (int $id): void{
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "id" => $id
        ]);

    }

    public function list(array $filters): array{

        $sql = "SELECT * FROM {$this->table} WHERE 1 = 1";
        $params = [];

        if (!empty($filters['nombre'])) {
            $sql .= " AND nombre = :nombre";
            $params['nombre'] = $filters['nombre'];
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}