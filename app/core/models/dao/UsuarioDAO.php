<?php

namespace app\core\models\dao;

use app\core\models\dao\base\InterfaceDAO;
use app\core\models\dao\base\DAO;


final class UsuarioDAO extends DAO implements InterfaceDAO{


    public function __construct(\PDO $connection){
        parent::__construct($connection, "usuarios");

    }

    public function save(array $data): void{

        $sql = "INSERT INTO {$this->table} VALUES (DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, :estado, NOW() , :resetPass)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            "apellido" => $data["apellido"],
            "nombres" => $data["nombres"],
            "cuenta" => $data["cuenta"],
            "perfil" => $data["perfil"],
            "clave" => password_hash($data["clave"], PASSWORD_DEFAULT),
            "correo" => $data["correo"],
            "estado" => $data["estado"],
            "resetPass" => $data["resetPass"]
        ]);

        $stmt->rowCount();  

    }

    public function load(int $id): array{
        
        $sql = "SELECT id, apellido, nombres, cuenta, perfil, correo, estado, fechaAlta FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["id" => $id]);

        if($stmt->rowCount() == 0){
            throw new \Exception("<p>No se encontraron coincidencias para el identificador {$id} de la Categoria DAO </p>");
        }
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update(array $data): void{

        $sql = "UPDATE {$this->table} SET apellido = :apellido, nombres = :nombres, cuenta = :cuenta, perfil = :perfil, correo = :correo, estado = :estado, fechaAlta = :fechaAlta WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        
        $stmt->execute([
            "id" => $data["id"],
            "apellido" => $data["apellido"],
            "nombres" => $data["nombres"],
            "cuenta" => $data["cuenta"],
            "perfil" => $data["perfil"],
            "correo" => $data["correo"],
            "estado" => $data["estado"],
            "fechaAlta" => $data["fechaAlta"]
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

        $sql = "SELECT * FROM {$this->table} WHERE 1=1";
        $params = [];
        // Construcción de la consulta SQL con filtros
        // Se utiliza 1=1 para facilitar la concatenación de condiciones
        if (!empty($filters['perfil'])) {
            $sql .= " AND perfil = :perfil";
            $params['perfil'] = $filters['perfil'];
        }

        if (isset($filters['estado'])) {
            $sql .= " AND estado = :estado";
            $params['estado'] = $filters['estado'];
        }
        //  Ordenás por ID de forma ascendente
        $sql .= " ORDER BY id ASC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        
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

    public function login($cuenta): array{

        $sql = "SELECT id, apellido, nombres, cuenta, correo, fechaAlta, perfil, clave, estado, resetPass  FROM {$this->table} WHERE cuenta = :cuenta OR correo = :cuenta";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute(["cuenta" => $cuenta]);

        if($stmt->rowCount() != 1){
            throw new \Exception("Los datos ingresados son incorrectos");
        }

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


}







