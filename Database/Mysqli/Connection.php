<?php

namespace Database\MySQLi;

class Connection {

    private static $instance;
    private $connection;

    private function __construct() {
        $this->make_connection();
    }

    public static function getInstance(): connection {

        if(!self::$instance instanceof self)
            self::$instance = new self();

        return self::$instance;
    }

    public function get_database_instance() {
        return $this->connection;
    }

    private function make_connection(): void {

        $server = "localhost";
        $database = "finanzas_personales";
        $username = "root";
        $password = "admin123";
        
        // Esta es al forma orientada a objetos
        $mysqli = new \mysqli($server, $username, $password, $database);
        
        // Comprobar conexión de manera orientada a objetos
        if ($mysqli->connect_errno)
            die("Falló la conexión: {$mysqli->connect_error}");
        if(!$mysqli->connect_errno)
            echo "Todo corre de maravilla";
        // Esto nos ayuda a poder usar cualquier caracter en nuestras consultas
        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $mysqli;
        
    }
    
}

$connection=connection::getInstance();
$connection->get_database_instance();

