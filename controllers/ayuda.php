<?php

class Ayuda extends Controller
{

    function __construct()
    {
        parent::__construct();
        // echo "Holla desde Ayuda";
    }

    function render(){
        $this->view->render('ayuda/index');
    }
}
