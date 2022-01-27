<?php
echo "<pre>";

class Main extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->render("main/index");
        // echo "Nuevo controlador Main<br><br>";
    }

    function saludo()
    {
        echo "Ejecutaste el método Saludo()<br><br>";
    }
}
