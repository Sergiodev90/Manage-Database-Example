<?php

require("../vendor/autoload.php");

use App\Controllers\IncomesController;
use App\Controllers\WithDrawalControler;
use Router\RouterHandler;

// Obtener la URL
$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

var_dump($slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

// incomes/1

// Intancia del router

$router = new RouterHandler();

switch ($resource) {

    case '/':
        echo "Estás en la front page";
        break;

    case "incomes":
        echo "Estas en incomes";
        
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(IncomesController::class, $id);

        break;

    case "withdrawals":
        
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithDrawalControler::class, $id);

        break;
    
    default:
        echo "404 Not Found";
        break;

}