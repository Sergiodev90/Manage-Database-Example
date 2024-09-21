<?php

namespace App\Controllers;
use Database\MySQLi\Connection;


class IncomesController {

    private $connection;

    public function __construct(){
        $this->connection = connection::getInstance()->get_database_instance();
    
        
    }
    /**
     * Muestra una lista de este recurso
     */
    public function index() {
        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();
        $results= $stmt->get_result();

        $results->fetch_all();


        foreach($results as $result){
            echo $result['amount'] ."\n";
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


        $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES(?,?,?,?,?);");

        /*   {$data['payment_method']},
            {$data['type']},
            '{$data['date']}',
            {$data['amount']},
            '{$data['description']}' */

        $stmt->bind_param("iisds",$payment_method,$type,$date,$amount,$description);



        $payment_method = $data['payment_method'];
        $type = $data['type'];
        $date = $data['date'];
        $amount = $data['amount'];
        $description = $data['description'];

        $stmt->execute();
        echo "\n";
        echo "Se han insertado {$stmt->affected_rows} filas en la base de datos ";

    }

    /**
     * Muestra un único recurso especificado
     */
    public function show(int $id) {
        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $results= $stmt->get_result();
        

        while($row = $results->fetch_assoc()){
            echo "{$row['amount']}{$row['description']},{$row['date']}";
        }



    }

    /**
     * Muestra el formulario para editar un recurso
     */
    public function edit() {}

    /**
     * Actualiza un recurso específico en la base de datos
     */
    public function update($id, array $data) {
        
    }   

    /**
     * Elimina un recurso específico de la base de datos
     */
    public function destroy($id) {
        $this->connection->begin_transaction();

        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();

        $sure = strtolower(readline("\n"."Are you sure you want to execute this query Y/N"));

        if($sure === "no" || $sure === 'n'){
            $this->connection->rollback();
            echo "Cancelled";
        }else{
            $this->connection->commit();
            echo "OK";
        }
    }
    
}
