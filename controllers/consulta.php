<?php
// echo "<pre>";

class Consulta extends Controller
{ // $this->view = new View();
    function __construct()
    {
        parent::__construct();
        $this->view->alumnos = [];
    }

    function render()
    {
        // gets all the list of users
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function verAlumno($param = null)
    {
        // var_dump($param);
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula;
        $this->view->alumno = $alumno;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno()
    {

        session_start();
        $matricula = $_SESSION['id_verAlumno'];
        $nombre    = $_POST['nombre'];
        $apellido  = $_POST['apellido'];

        unset($_SESSION["id_verAlumno"]);

        // print_r($nombre);   output:  Mark

        // IMPORTANT = 2 HOURS TO FIND OUT THAT IT WAS NOT PASSING AN OBJECT BUT AS INSTEAD OF THIS  =>  I WAS DOING THIS -> SO THE $ITEM PASSED ON TO MODEL UPDATE FUNCTION WAS BEING PASSED AS A STRING  :(
        if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            // update student successful
            $alumno = new Alumno();

            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            // echo "update alumno <br>";
            // print_r($alumno);

            $this->view->alumno = $alumno;
            $this->view->mensaje = "Alumno actualizado correctamente";
        } else {
            // error message
            $this->view->mensaje = "No se pudo actualizar el alumno";
        }
        $this->view->render("consulta/detalle");
    }

    function eliminarAlumno($param = null)
    {

        $matricula = $param[0];

        if ($this->model->delete($matricula)) {

            $this->view->mensaje = "Alumno eliminado correctamente";
        } else {
            // error message
            $this->view->mensaje = "No se pudo eliminar el alumno";
        }
        $this->render();
    }
}
