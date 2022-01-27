<?php
echo "<pre>";

class Errors extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Error al cargar el recurso  desde controllers/errors.php  <br> y vista desde Views/error/index.php";
        $this->view->render("error/index");
        // echo "Error al cargar recurso.php<br>";
    }
}
