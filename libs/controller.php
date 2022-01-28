<?php

class Controller
{   // Controlador Base,  it is the controller that, depending on what the View sends, works with the Model to later on return/create the View

    function __construct()
    {
        // echo "<br>Controlador base /libs/controller.php</br><br>";
        $this->view = new View();  // in the controller we have the view(s)
        // print_r($this);
        // print_r($this->view);
    }

    // CREATE A MODEL
    function loadModel($model){  // to especify that we want to load Model
        $url = "models/" . $model . "model.php";   // creat URL var so all our Model files will end in model 

        if(file_exists($url)){  // check if file exists (url)
            require $url;   //call the file

            $modelName = $model. "Model";   // 
            $this->model = new $modelName();  //  in the controlle we have the Model - a private variable created for this class, call the Model especified in this Controller class 

            //
        }
    }

}
