<?php

class Model    // contains all the logic to access and how we shape and work with database, sets how to connect or query database
{

    function __construct()   //  Each model will have their own connection to the database
    {  // lets create our object 
        $this->db = new Database();  // object from our DB this do the calls
    }
}
