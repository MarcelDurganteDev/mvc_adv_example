<?php
// echo "<pre>";

class Main extends Controller
{
    // $this->view = new View();

    function __construct()
    {
        parent::__construct();
        // echo "Nuevo controlador Main<br><br>";

        // print_r($this);
        // print_r($this->view);

        // print_r($this->view->render("main/index"));
    }

    function render(){
        $this->view->render('main/index');
    }

    function saludo()
    {
        echo "Ejecutaste el método Saludo()<br><br>";
    }
}
