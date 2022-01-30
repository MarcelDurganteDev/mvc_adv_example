<?php
// echo "<pre>";

require_once "controllers/errors.php";

// CHECKS WHERE WHERE WE NEED TO BRING THE USER
class App
{
    function __construct()
    {
        // echo "<br>New App from /libs/app.php</br><br>";

        // if url first fragment is set (there is) gets it otherwise is empty
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);

        // WHEN PASS CONTROLLER EMPTY IN THE URL
        if (empty($url[0])) {

            // file controller URL
            $archivoController = "controllers/main.php";
            // print_r($archivoController);

            // Example:  controllers/main.php   OR   controllers/etc.php
            require_once $archivoController;
            $controller = new Main();

            // call Model method because if we create a Model it is called main
            $controller->loadModel('main');
            // var_dump($controller);

            $controller->render();

            return false;
        }

        $archivoController = "controllers/" . $url[0] . ".php";

        // Checks if file exists
        if (file_exists($archivoController)) {
            require_once $archivoController;

            // ignit Controller
            // file controller Name ????????? QUE CLASSE SERIA   $url[0] ???????
            $controller = new $url[0];

              //call Model because if we create a Model it is called whatever is passe in $url[0]
            $controller->loadModel($url[0]);
           
            // print_r($archivoController);

            // # number of elements in the URL array
            $nparam =sizeof($url);

            if ($nparam > 1){
                if ($nparam > 2){
                    $param = [];
                    
                    for($i = 2; $i < $nparam; $i++){
                        array_push($param, $url[$i]);
                    } 
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                } 
            }else {
                    $controller->render();
                }
            } else {
                $controller = new Errors();
            // var_dump($controller);
        }
    }
}

?>
