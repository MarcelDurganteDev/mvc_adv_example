<?php
// echo "<pre>";

require_once "controllers/errors.php";
class App  // MAPEO DE ADONDE QUEREMOS LLEVAR EL USUARIO
{
    function __construct()
    {
        // echo "<br>New App from /libs/app.php</br><br>";

        $url = isset($_GET['url']) ? $_GET['url'] : null; // if url first fragment is set (there is) gets it otherwise is empty
        $url = rtrim($url, "/");
        $url = explode("/", $url);

        if(empty($url[0])) { // if second url fragment is empty brings user to main.php view
            $archivoController = "controllers/main.php";   // file controller URL
            // print_r($archivoController);
            require_once $archivoController;   // Example:  controllers/main.php   OR   controllers/etc.php
            $controller = new Main();
            $controller->loadModel($url[0]);  // call Model method because if we create a Model it is called main
            // var_dump($controller);
            return false;
        }
        $archivoController = "controllers/" . $url[0] . ".php";

        if (file_exists($archivoController)) {    // Checks if file exists
            require_once $archivoController;
            $controller = new $url[0];  // file controller Name ????????? QUE CLASSE SERIA   $url[0] ???????
            // print_r($archivoController);
            $controller->loadModel($url[0]);  //call Model because if we create a Model it is called whatever is passe in $url[0]
            if (isset($url[1]))  
            {  
                $controller->{$url[1]}();  //  el texto que hay aqui interpretará como um método ( chamará este método - pois isso () depois das chaves, assim indentifica o segundo url como metodo da class MAIN extends class CONTROLLER ( /controllers/main.php  extends /libs/main.php )&& method_exists($controller, $url[1])){
            }  
        } else {
            $controller = new Errors();
            // var_dump($controller);
        }
    }
}
    

