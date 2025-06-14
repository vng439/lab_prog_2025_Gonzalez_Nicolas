<?php

namespace app\core\models\dao\base;

class DAO {

    protected $connection; //GUARDA LA CONEXIÓN A LA BASE DE DATOS. ES UNA REFERENCIA
    protected $table; //NOMBRE DE LA TABLA QUE SE ESTÁ MAPEANDO. SE GUARDA EL NOMBRE DE LA TABLA EN EL DAO.


    public function __construct(\PDO $connection, string $table){

        $this->connection = $connection;
        $this->table = $table;
    }

    public function foundRows(): int{
        $stmt = $this->connection->query("SELECT FOUND_ROWS();"); //CUÁNTOS REGISTROS ENCONTRÓ PREVIO A LA CONSULTA SQL SIN LOS FILTROS/LIMITES (limit de sql).
        $data = $stmt->fetch(\PDO::FETCH_NUM);
        $stmt->closeCursor();
        return (int) $data[0];
    }

    public function getLastInsertId(): int{
        $id = $this->connection->lastInsertId();
        return is_numeric($id) ? (int) $id : 0;
    }
}