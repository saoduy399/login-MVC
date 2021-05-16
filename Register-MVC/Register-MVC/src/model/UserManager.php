<?php


namespace APP\model;


class UserManager
{
    protected $connect;

    public function __construct()
    {
        $manager = new DBConnect();
        $this->connect = $manager->connect();
    }

    public function addAccount($id,$name,$username,$password,$email){
        $sql = "INSERT INTO accounts VALUE($id,'$name','$username','$password','$email')";
        $query = $this->connect->query($sql);
        return $query->execute();
    }
}