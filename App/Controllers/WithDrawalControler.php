<?php
namespace App\Controllers;

require("vendor/autoload.php");
use Database\PDO\Connection;


namespace App\Controllers;
use Database\PDO\Connection;

class WithDrawalControler {
    private $connection;

    public function __construct(){
        $this->connection = Connection::getInstance()->get_database_instance();
    }
    /**
     * Muestra una lista de este recurso
     * 
     */
    



    public function index() {
    //    $stmt =  $this->connection->prepare("SELECT * FROM withdrawals");
    //    $stmt->execute();

    //    $results = $stmt->fetchAll();

    //    foreach($results as $result){
    //     echo "Gastaste" .$result['amount'];
    //    }

        //esto de aca es usando fetchColum
        $stmt =  $this->connection->prepare("SELECT * FROM withdrawals");
        $stmt->execute();

       while($row = $stmt->fetch()){
            echo "Ganaste".$row['amount'];
       }
    }

    /**
     * Muestra un formulario para crear un nuevo recurso
     */
    public function create() {}

    /**
     * Guarda un nuevo recurso en la base de datos
     */
    public function store($data) {


        $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type, time, amount, description) VALUES (
            :payment_method,
            :type,
            :time,
            :amount,
            :description
        )");

        $stmt->bindValue(":payment_method",$data['payment_method']);
        $stmt->bindValue(":type",$data['type']);
        $stmt->bindValue(":time",$data['time']);
        $stmt->bindValue(":amount",$data['amount']);
        $stmt->bindValue(":description",$data['description']);

        $stmt->execute();

    }

    /**
     * Muestra un único recurso especificado
     */
    public function show($id) {
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals WHERE id=:id");
        $stmt->execute([
            ":id" => $id
        ]);

        $results = $stmt->fetch();

        var_dump($results);
    }

    /**
     * Muestra el formulario para editar un recurso
     */
    public function edit() {}

    /**
     * Actualiza un recurso específico en la base de datos
     */
    public function update() {}

    /**
     * Elimina un recurso específico de la base de datos
     */
    public function destroy() {}
    
}
