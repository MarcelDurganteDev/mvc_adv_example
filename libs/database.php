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
        // hacer ref as mis variables y atribuir a constantes  
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect()
    {
        try {
            // mysql:host=  here we specify the driver
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [  // options to describe the errors
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r("Error connection: " . $e->getMessage());  //get message $e from the object
        }
    }
}
