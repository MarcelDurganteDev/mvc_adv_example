<?php
// echo "<pre>";

class Consulta extends Controller
{ // $this->view = new View();
    function __construct()
    {
        parent::__construct();
        $this->view->render("consulta/index");
    }
}
