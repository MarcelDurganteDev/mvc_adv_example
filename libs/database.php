<?php
// crear la connection with database
class Database
{
    private $host;
    private $db;
    private $usr;
    private $password;
    private $charset;

    public function __construct()
    {
        // CONST AND VARIABLES DEFINED IN CONFIG.PHP AND REFERENCE TO THIS VARIABLES BELLOW  

        $this->host = constant('HOST');                    // localhost
        $this->db = constant('DB');                          // mvc
        $this->user = constant('USER');                    // root
        $this->password = constant('PASSWORD');     // " "
        $this->charset = constant('CHARSET');          //   utf8mb4

    }

    function connect()
    {
        try {
            // mysql:host=  here we specify the driver
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            // var_dump($connection);    string(47) "mysql:host=localhost;dbname=mvc;charset=utf8mb4"

            // options to describe the errors
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            // echo "options";
            // var_dump($options);   array(2) { [3]=> int(2) [20]=> bool(false) }

            $pdo = new PDO($connection, $this->user, $this->password, $options);
            // echo "pdo";
            // var_dump($pdo);   object(PDO)#6 (0) { }

            return $pdo;
        } catch (PDOException $e) {

            //get message $e from the object
            print_r("Error connection: " . $e->getMessage());
        }
    }
}