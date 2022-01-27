<?php
// echo "<pre>";

class Nuevo extends Controller
{ // $this->view = new View();
    function __construct()
    {
        parent::__construct();
        $this->view->render("nuevo/index");
    }
}
