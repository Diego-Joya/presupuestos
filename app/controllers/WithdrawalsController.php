<?php

namespace App\Controllers;
use Database\PDO\connection;
class WithdrawalsController
{
    private $connecion;
    public function __construct()
    {
        $this->connecion = connection::getInstance()->get_database_instance();
    }

    public function index()
    {
        $cons = $this->connecion->prepare("select * from salidas");
        $cons->execute();
        $resul = $cons->fetchAll(\PDO::FETCH_ASSOC);
        require("../resources/views/withdrawals/index.php");

    }

    public function create()
    {
        require("../resources/views/withdrawals/create.php");
        echo "<script>console.log('valor del console:','jajajjaj')</script>";

    }
    public function store($data)
    {
        $cons = $this->connecion->prepare("INSERT INTO salidas(fecha, valor, motivo, metodo) VALUES (:fecha, :valor, :motivo, :metodo)");
        $cons->bindValue(":fecha", $data["fecha"]);
        $cons->bindValue(":valor", $data["valor"]);
        $cons->bindValue(":motivo", $data["motivo"]);
        $cons->bindValue(":metodo", $data["metodo"]);

        $cons->execute();

        header("location: withdrawals");


    }
    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
