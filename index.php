<?php
use App\Controllers\IncomesController;
require("vendor/autoload.php");


// $incomes_controller = new IncomesController();
// $incomes_controller->store([
//     "fecha"=>date("Y-m-d H:i:s"),
//     "valor"=>2000,
//     "motivo"=>'buen ejercicio',
//     "metodo"=>'efectivo'
//     ]
// );


// $income_controller = new IncomesController();
// $income_controller->store([
//         "fecha"=>date("Y-m-d H:i:s"),
//         "valor"=>100,
//         "motivo"=>'prueba insert',
//         "metodo"=>'efectivo'
// ]);
//Consultar todo
// $income_controller = new IncomesController();
// $income_controller->index();
//  actualizar

$income_controller = new IncomesController();
$income_controller->update([
    "id"=>1,
    "valor"=>190
]);
