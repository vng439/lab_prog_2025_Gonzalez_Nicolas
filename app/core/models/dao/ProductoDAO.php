<?php

namespace app\core\models\dao;

use app\core\models\dao\base\InterfaceDAO;
use app\core\models\dao\base\DAO;


final class ProductoDAO extends DAO implements InterfaceDAO{


    public function __construct(\PDO $connection){
        parent::__construct($connection, "productos");

    }

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES (DEFAULT, :nombre, :codigo, :descripcion, :categoriaId, :precio, :stock)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "nombre" => $data["nombre"],
            "codigo" => $data["codigo"],
            "descripcion" => $data["descripcion"],
            "categoriaId" => $data["categoriaId"],
            "precio" => $data["precio"],
            "stock" => $data["stock"],
        ]);

    }

    public function load(int $id): array{

        $sql = "SELECT id, nombre, codigo, descripcion, categoriaId, precio, stock FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update (array $data): void{

        $sql = "UPDATE {$this->table} SET nombre = :nombre, codigo = :codigo, descripcion = :descripcion, categoriaId = :categoriaId, precio = :precio, stock = :stock 
        WHERE id = :id ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "id" => $data["id"],
            "nombre" => $data["nombre"],
            "codigo" => $data["codigo"],
            "descripcion" => $data["descripcion"],
            "categoriaId" => $data["categoriaId"],
            "precio" => $data["precio"],
            "stock" => $data["stock"],
        ]);
    }

    public function delete (int $id): void{
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "id" => $id
        ]);
    }

    public function list(array $filters): array {

    $sql = "SELECT * FROM {$this->table} WHERE 1=1";
        $params = [];
        // Construcción de la consulta SQL con filtros
        // Se utiliza 1=1 para facilitar la concatenación de condiciones

        if (isset($filters['categoria'])) {
            $sql .= " AND categoriaId = :categoriaId";
            $params['categoriaId'] = $filters['categoria'];
        }
        //  Ordenás por ID de forma ascendente
        $sql .= " ORDER BY id ASC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }   

    /* public function list(array $filters): array{

        $sql = "SELECT * FROM {$this->table} WHERE 1=1";
        $params = [];

        if (!empty($filters['codigo'])) {
            $sql .= " AND codigo = :codigo";
            $params['codigo'] = $filters['codigo'];
        }

        if (!empty($filters['categoriaId'])) {
            $sql .= " AND categoriaId = :categoriaId";
            $params['categoriaId'] = $filters['categoriaId'];
        }
        // sql .= "ORDER BY id ASC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } */

    
}