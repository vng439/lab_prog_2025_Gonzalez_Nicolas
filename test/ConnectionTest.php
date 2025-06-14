<?php

require_once "../app/libs/database/Connection.php";
require_once "../app/config/DBConfig.php";

use app\libs\database\Connection;


try{

    $connection = Connection::get(); //OBJETO DEL TIPO PDO

   // $sql = "INSERT INTO categorias VALUES (DEFAULT, 'Vinilo')";

    $sql = "SELECT id, nombre FROM categorias";

    $stmt = $connection->query($sql);

    //   $filasAfectadas =  $connection->exec($sql); 

    echo "<p> registros encontrados  => {$stmt->rowCount()} </p>";

    //CLASE PDO CHEQUEARLA EN LA BIBLIA PHP

    //MOSTRAR EL PRIMER REGISTRO


   /*  $registro = $stmt->fetch();
    echo "<p> Primera Categoria => {$registro->nombre} </p>"; */


    //MOSTRAR 
    $registro = $stmt->fetch(\PDO::FETCH_NUM);
    echo "<p> Primera Categoria : id => {$registro[0]} | nombre = {$registro[1]} </p>";


    //MOSTRAR EL REGISTRO CON EL ID DADO

    $id = 1;

    $sql = "SELECT id, nombre FROM categorias WHERE id = " .$id;

    $stmt = $conn->query($sql);

}


catch(\PDOException $ex){
    echo "Error en database => " . $ex->getMessage();
}