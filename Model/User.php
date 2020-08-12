<?php

class User
{
    // table fields
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $date_of_birth;



    // constructor set default value
    function __construct()
    {
        $id = 0;
        $email = "";
        $first_name = "";
        $last_name = "";
        $password = "";
        $date_of_birth = "";
    }
}
