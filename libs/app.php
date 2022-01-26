<?php
echo "<pre>";
class App
{
    function __construct()
    {
        echo "<br>New App</br>";

        $url = $_GET['url'];
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        $fileController = "controllers/" . $url[0] . ".php";   // file controller URL

        if (file_exists($fileController)) {    // Checks if file exists
            require_once $fileController;   // Example:  controllers/main.php   OR   controllers/etc.php
            $controller = new $url[0];  // file controller Name 
            echo "controller";
        } else {
            
        }

    }
}
