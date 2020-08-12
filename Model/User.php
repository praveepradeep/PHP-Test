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

    // message string
    public $id_msg;
    public $email_msg;
    public $first_name_msg;
    public $last_name_msg;
    public $password_msg;
    public $date_of_birth_msg;

    // constructor set default value
    function __construct()
    {
        $id = 0;
        $email = "";
        $first_name = "";
        $last_name = "";
        $password = "";
        $date_of_birth = "";
        
        $id_msg = "";
        $email_msg = "";
        $first_name_msg = "";
        $last_name_msg = "";
        $password_msg = "";
        $date_of_birth_msg = "";
    }
}
