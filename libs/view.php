<?php

class View extends Controller            // View Base
{


    function __construct()
    {
        // echo "<p>Vista base /libs/view.php</p><br><br>";
    }

    function render($nombre)
    {
        require "views/" . $nombre . ".php";
    }
}
