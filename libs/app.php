<?php
// echo "<pre>";

require_once "controllers/errors.php";
class App  // MAPEO DE ADONDE QUEREMOS LLEVAR EL USUARIO
{
    function __construct()
    {
        echo "<br>New App from /libs/app.php</br><br>";

        $url = $_GET['url'];
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        $fileController = "controllers/" . $url[0] . ".php";   // file controller URL
        if (file_exists($fileController)) {    // Checks if file exists
            require_once $fileController;   // Example:  controllers/main.php   OR   controllers/etc.php
            // print_r($fileController);
            $controller = new $url[0];  // file controller Name ????????? QUE CLASSE SERIA   $url[0] ???????
            // print_r($fileController);
            // var_dump($controller);
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
    

