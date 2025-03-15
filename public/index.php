<?php
use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use Router\RouterHandler;


require("../vendor/autoload.php");

$slug = $_GET['slug'] ?? "";
$slug = explode('/', $slug);
$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

$router = new RouterHandler();

echo "<script>console.log('methodo:" . $_SERVER['REQUEST_METHOD'] . "');</script>";
echo "<script>console.log('Ruta:" . $resource . "');</script>";
switch ($resource) {
    case '/':
        require_once("../resources/views/home/index.php");
        break;
    case 'incomes':

        $method = $_POST["method"] ?? "get";
        echo "<script>console.log('metodo en index:" . $method . "');</script>";
        $router->set_method($method);
        $router->set_data($_POST);
        if ( isset($slug[1])&&$slug[1] == 'edit' ) {
            $router->route(IncomesController::class, 'edit', $slug[2]);
        } else {
            $router->route(IncomesController::class, $id);
        }
        break;
    case 'withdrawals':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithdrawalsController::class, $id);
        break;

    default:
        echo "no se encontro la página";
        break;
}