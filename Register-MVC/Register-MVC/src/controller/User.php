<?php


namespace APP\controller;

use APP\model;


class User
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;

    public function __construct($id,$name, $username, $password, $email)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->id = $id;

    }
}

