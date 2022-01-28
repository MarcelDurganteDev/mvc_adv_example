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

    //NUEVO.PHP CONTROLLER RECEIVES DATA FROM FORM  ($matricula, $nombre, $appellido) and PASS THEM ON TO NUEVOMODEL, THAT WILL CREATE A NEW DB OBJECT  FROM BASE MODEL (nuevoModel extends Model) and  WILL CONNECT  TO DATABASE AS IT CALLS THE FUNCTINO CONNECT() FROM DATABASE.PHP,  AND NUEVOMODELO WILL ALSO PREPARE THIS DB OBJECT (connect() returns a PDO OBJECT), WILL QUERY EXECUTE MAPING THE INFO ARRAY RECEIVED --  execute(["matricula" => $datos["matricula"], "nombre" => $datos["nombre"], "apellido" => $datos["apellido"],]);, THAN RETURN TRUE OR FALSE TO NUEVO CONTROLLER THAT CALLS THE FUNCTION INSERT -- insert(["matricula" => $matricula, "nombre" => $nombre, "apellido" => $apellido]); THAT ADD DATA TO TABLE ALUMNO

    function registrarAlumno()
    {
        // $this->model->insert(); 

        // get inputs - register info in controller 'cause' the model just pass the info filtered

        $matricula = $_POST["matricula"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];

        // this "model" is the object we created in our base Controller  --- sending an array to my insert function to the Model

        $this->model->insert(["matricula" => $matricula, "nombre" => $nombre, "apellido" => $apellido]);
    }
}
