<?php
namespace Database\PDO;
class connection
{
    private static $instance;
    private $conecBd;

    private function __construct()
    {
        $this->make_connection();
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public  function get_database_instance()
    {
        return $this->conecBd;
    }

    private function make_connection()
    {

        $server = "localhost";
        $database = "finanzas";
        $username = "root";
        $password = "";



        try {

            $connection = new \PDO("mysql:host=$server; dbname=$database", $username, $password);



            $setnames = $connection->prepare("SET NAMES 'utf8'");
            $setnames->execute();
            $this->conecBd = $connection;
            // if ($setnames) {
            //     echo "Conjunto de caracteres configurado correctamente.";
            // } else {
            //     echo "Hubo un problema al configurar el conjunto de caracteres.";
            // }

            // var_dump($setnames);

        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



}




