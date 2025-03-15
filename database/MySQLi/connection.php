<?php
namespace Database\MySQLi;

class connection
{
    private static $instance;

    private $connection;

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

    public function get_data_instance()
    {
        return $this->connection;
    }


    private function make_connection()
    {

        $server = "localhost";
        $database = "finanzas";
        $username = "root";
        $password = '$Aca_Nube123';

        // conexion con mysqli solo soport MySQL
        $sql = new \mysqli($server, $username, $password, $database);

        if ($sql->connect_errno) {
            die("Fallo la conexión a la BD" . $sql->connect_error);
        }

        $setnames = $sql->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $sql;
        // var_dump($setnames);
    }
}
