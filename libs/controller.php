<?php

class Controller
{   // Controlador Base

    function __construct()
    {
        // echo "<br>Controlador base /libs/controller.php</br><br>";
        $this->view = new View();
        // print_r($this);
        // print_r($this->view);
    
    }
}
