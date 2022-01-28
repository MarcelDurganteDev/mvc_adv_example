<?php
// echo "<pre>";

// Insert info here in controller and do validations (check if info structure that we are receiving is correct, ), the Model just do the transaction/connection with DB sending the info filtered so Model just calls DB to do the transaction

class Nuevo extends Controller
{ // $this->view = new View();
    function __construct()
    {
        parent::__construct();
        $this->view->render("nuevo/index");
    }

    function registrarAlumno(){  // receive the data and call the Model, it call Registrar Alumnos
        // $this->model->insert(); 
        // get inputs - register info in controller porque in the model just passa the info filtered
        $matricula = $_POST["matricula"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];

        $this->model->insert(["matricula" => $matricula, "nombre" => $nombre, "apellido" => $apellido]);    // this "model" is the object we created in our base Controller  --- sending an array to my insert function to the Model
        
    }
}
