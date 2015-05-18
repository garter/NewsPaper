<?php
require_once 'global_class.php';

class User extends GlobalClass{
    
    public function __construct( $db) {
        parent::__construct("users", $db);
    }
    
    public function addUser($login, $pass, $regdate){
        if (!$this->checkValid($login, $pass, $regdate)) return false;
        return $this->add(array("login" => $login, "pass" => $pass, "regdate" => $regdate));
    }
    
    public function editUser($id, $login, $pass, $regdate){
        if (!$this->checkValid($login, $pass, $regdate)) return false;
        return $this->edit($id, array("login" => $login, "pass" => $pass, "regdate" => $regdate));
    }
    
    public function isExists($login) {
        return parent::isExists("login", $login);
    }


    private function checkValid($login, $pass, $regdate){
        if (!$this->valid->validLogin($login))return false;
        if (!$this->valid->vaidHash($pass)) return false;
        if (!$this->valid->validTimeStamp($regdate)) return false;
        return true;
    }
    
    public function getUserOnLogin($login){
        $id = $this->getField("id", "login", $login);
        return $this->get($id);
    }
}
