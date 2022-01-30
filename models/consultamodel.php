<?php

include_once 'models/alumno.php';

class ConsultaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {   // we'll deliver an array in GET that why we create an empty array
        $items = [];

        try {

            // consult the db 
            $query = $this->db->connect()->query('SELECT * FROM alumnos');

            // add to the array all the element form the consultation
            while ($row = $query->fetch()) {
                // echo "<pre>";
                // create an object of type Alumno, and asigning to the properties the values that we have in our db
                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
                // print_r($items);
                // print_r($item);
                
                array_push($items, $item);
            }
            // return the array 
            return $items;

        } catch (PDOException $e) {

            //  if it does not work delivers an empty array
            return [];
        }
    }

    public function getById($id)
    {
        $item = new Alumno();

        $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE matricula = :matricula");

        try {
            $query->execute(['matricula' => $id]);

            while ($row = $query->fetch()) {

                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
            }

            return $item;

            // var_dump($item);
            
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($item){
        // echo "<pre>";
        
        // var_dump($item);


        $query = $this->db->connect()->prepare("UPDATE alumnos SET nombre = :nombre, apellido = :apellido WHERE matricula = :matricula");
        try {

         
            // echo "update item after query";
            // var_dump($item);

            $query->execute(["matricula" => $item["matricula"], "nombre" => $item["nombre"], "apellido" => $item["apellido"]
            ]);

            return true;

        } catch(PDOException $e){

            return false;

        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM alumnos WHERE matricula = :id");
        try {
            // var_dump($item["matricula"]);
            // var_dump($item);
            $query->execute([
                "id" => $id,
            ]);
            return true;
        } catch(PDOException $e){
            return false;
        }
    }
}
