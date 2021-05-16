<?php

namespace APP\controller;

use APP\model;

class BaseController
{
    protected $connect;

    public function __construct(){
        $dbConnect = new model\DBConnect();
        $this->connect = $dbConnect->connect();
    }

    public function getAllAccount(){
        $sql = "SELECT * FROM accounts";
        $query = $this->connect->query($sql);
        $account = $query->fetchAll();
        $users=[];
        foreach ($account as $item){
            $user = new User($item["id"],$item["name"], $item["username"], $item["password"], $item["email"]);
            $user->id = $item["id"];
            $users[] = $user;
        }
        return $users;
    }

    public function checkAccount($username,$password)
    {
        $account = $this->getAllAccount();
        foreach ($account as $item) {
            if ($username == $item->username) {
                if ($password == $item->password) {
                    echo "Successfully";
                    return;
                } else {
                    echo "Wrong password!";
                    return;
                }
            }
        }
        echo "This account has not been register!";
    }

    public function checkRegister($id,$name,$username,$password,$email){
        $users = $this->getAllAccount();
        foreach ($users as $item){
            if($username==$item->username){
                echo "Tk ddax duowcj dangw kis";
                return;
            } elseif ($email == $item->email){
                echo "email da duowcj dangw kis";
                return;
            }
        }
//        $user = new User($id,$name,$username,$password,$email);
        $addAccount = new model\UserManager();
        $addAccount->addAccount($id,$name,$username,$password,$email);
        echo "dang ki thanh cong";


    }


}