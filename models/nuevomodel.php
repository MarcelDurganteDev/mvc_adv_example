<?php

class NuevoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    // CRUD methods
    // FUNCTION INSERT insert data in DB - we call it in NUEVO CONTROLLER
    public function insert($datos)
    {
        // print_r($datos);  Array ( [matricula] => MARK [nombre] => MARK [apellido] => MARK )
        // here in insert we call our tables in our DB
        try {   // DB from MODELO BASE that references DATABASE.PHP where we call CONNECT() that returns a PDO OBJECT
            $query = $this->db->connect()->prepare('INSERT INTO alumnos (MATRICULA, NOMBRE, APELLIDO) VALUES (:matricula, :nombre, :apellido)');  // than we prepare the injection (THE PDO OBJECT) to avoid SQL problems
            // echo "<pre>";
            // print_r($query);
            // echo "hi";
            
            $query->execute(["matricula" => $datos["matricula"], "nombre" => $datos["nombre"], "apellido" => $datos["apellido"],]); // how I am mapping the info from the array with the SQL statment
            // print_r($query);
            // echo "Insertar datos";
            return true;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            // echo "Ya existe esa matricula";
            return false;
        }
    }
}
