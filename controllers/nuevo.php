<?php
// echo "<pre>";

class Nuevo extends Controller
{ // $this->view = new View();
    function __construct()
    {
        parent::__construct();
        $this->view->render("nuevo/index");
    }

    function registrarAlumno(){  // receive the data and call the Model, it call Registrar Alumnos
        echo "Alumno creado";
        $this->model->insert(); // 
    }
}
