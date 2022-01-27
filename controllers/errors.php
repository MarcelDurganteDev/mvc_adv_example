<?php
// echo "<pre>";



class Errors extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página!   <br><br> (desde controllers/errors.php y vista desde Views/error/index.php)";
        $this->view->render("error/index");
        // echo "Error al cargar recurso.php<br>";
    }
}
