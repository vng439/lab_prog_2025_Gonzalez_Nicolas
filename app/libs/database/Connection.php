<?php

namespace app\libs\database;

final class Connection{

    private static ?\PDO $conn = null;

    private function __construct(){

    }

    public static function get(): \PDO {
        if (self::$conn === null) {
            self::$conn = new \PDO(DATABASE_DSN, "root", "", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, // Devuelve resultados como objetos
            ]);
        }
        return self::$conn;
    }

    /* public static function get(): \PDO{
        if(self::$conn == null){ //SI LA CONEXION ES NULL, LA CREAMOS Y POSTERIORMENTE SE LA RETORNA. EN CASO DE QUE YA EXISTA SÓLO SE LA RETORNA
            $conn = new \PDO(DATABASE_DSN, "root", "", array(

                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ //DEVUELVE COMO UN OBJETO
                
                //fetch = obtener el próximo registro de la consulta. Aca se configura que por cada vez que se haga un fetch, 
                // devuelva un resultado y no como array

            )); //CADA VEZ QUE QUIERA UNA CONEXION CON LA BD, TRABAJAMOS CON LA MISMA CONEXION. 
        }
        return $conn;
    } */
}