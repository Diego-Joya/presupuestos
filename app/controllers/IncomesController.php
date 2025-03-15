<?php

namespace App\Controllers;
use Database\PDO\connection;
// use Database\MySQLi\connection;
// use Database\PDO\connection;
class IncomesController
{
    private $connection;

    public function __construct()
    {
        // $this->connection = connection::getInstance()->get_data_instance();
        $this->connection = connection::getInstance()->get_database_instance();
    }
    public function index()
    {
        $consul = $this->connection->prepare("select * from ingresos");
        $consul->execute();
        $rest = $consul->fetchAll(\PDO::FETCH_ASSOC);

        require_once("../resources/views/incomes/index.php");


    }

    public function create()
    {
        require("../resources/views/incomes/create.php");
        echo "<script>console.log('Mensaje desde PHP: hola mi amor');</script>";

    }
    public function store($data)
    {
        echo "<script>console.log('store: " . $data . "');</script>";

        // $connect = connection::getInstance()->get_data_instance();
        // $connect->query("INSERT INTO ingresos( fecha, valor, motivo, metodo) VALUES ('{$data['fecha']}',{$data['valor']},'{$data['motivo']}','{$data['metodo']}')");
        $cons = $this->connection->prepare("INSERT INTO ingresos( fecha, valor, motivo, metodo) VALUES (:fecha, :valor, :motivo, :metodo)");
        $cons->bindValue(":fecha", $data['fecha']);
        $cons->bindValue(":valor", $data['valor']);
        $cons->bindValue(":motivo", $data['motivo']);
        $cons->bindValue(":metodo", $data['metodo']);
        $cons->execute();
        header("location:incomes");

    }
    public function show()
    {

    }
    public function edit($id)
    {
        $sql = "SELECT * FROM ingresos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $gasto = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($gasto === false) {
            echo "No se encontró ningún gasto con el ID: $id";
        }
        //  else {
        //     foreach ($gasto as $key => $value) {
        //         echo "$key: $value\n";
        //     }
        // }

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $fecha = $_POST['fecha'];
        //     $valor = $_POST['valor'];
        //     $motivo = $_POST['motivo'];
        //     $metodo = $_POST['metodo'];

        //     // Actualizar el gasto
        //     $updateSql = "UPDATE gastos SET fecha = :fecha, valor = :valor, motivo = :motivo, metodo = :metodo WHERE id = :id";
        //     $updateStmt = $this->connection->prepare($updateSql);
        //     $updateStmt->bindParam(':fecha', $fecha);
        //     $updateStmt->bindParam(':valor', $valor);
        //     $updateStmt->bindParam(':motivo', $motivo);
        //     $updateStmt->bindParam(':metodo', $metodo);
        //     $updateStmt->bindParam(':id', $id, \PDO::PARAM_INT);
        //     $updateStmt->execute();

        //     // Redirigir a la página principal
        //     header("Location: /incomes");
        //     exit;
        // }

        // Cargar la vista de edición


        require("../resources/views/incomes/editar_gasto.php");
        echo "<script>console.log('Mensaje desde PHP: hola mi amor');</script>";
        echo "<script>console.log('Valor de  id: ".  $id."');</script>";

    }
    public function update($data)
    {
        $this->connection->beginTransaction();
        $stmt = $this->connection->prepare("update ingresos set valor=:valor where id=:id");
        $stmt->bindValue(":id", $data["id"]);
        $stmt->bindValue(":valor", $data["valor"]);
        $stmt->execute();
        $sure = readline("quiere hacer el update?");
        if ($sure == "s") {

            $this->connection->commit();
        } else {
            $this->connection->rollBack();
        }
    }
    public function destroy()
    {

    }


}
