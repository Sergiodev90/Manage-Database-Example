<?php

namespace Database\PDO;




class Connection{
    private static $instance;
    private $connection;

    private function __construct(){
        $this->make_connection();
    }

    public static function getInstance(){
        if(!self::$instance instanceof self)
            self::$instance = new self();
        
        return self::$instance;
    }
    public function get_database_instance(){
        return $this->connection;
    }

    private function make_connection(){
        $dbh = "mysql:host=localhost";
        $database = "finanzas_personales";
        $username = "root";
        $password = "admin123";
        
        
        $connection =new \PDO("$dbh;dbname=$database", $username, $password);
        
        $setnames = $connection->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $connection;
    }
}



