<?php

class Conexion
{
    private const DB_SERVER = "localhost:3463";
    private const DB_USER = "root";
    private const DB_PASS = "";
    private const DB_NAME = "libros_pappalardo";

    public const DB_DSN = "mysql:host=".self::DB_SERVER.";dbname=".self::DB_NAME.";charset=utf8mb4";

    protected PDO $db;
  
    public function __construct()
    {
        try {
        $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS); 
        // echo "conectada";     
        } catch (Exception $e) {
        // echo $e->getFile();
        echo "No se puede conectar a la base de datos";
        die; 
        }
    }

    public function getConexion() : PDO {
        return $this->db;
    }
}



?>