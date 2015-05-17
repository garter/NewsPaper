<?php
require_once 'config_class.php';
class checkValid {
   private $config;
   
   public function __construct() {
       $this->config = new Config();
   }
   
   public function validID($id){
       if (!$this->isIntNumber($id)) return false;
       if ($id <= 0) return false;
        return  true;
   }
   
   private function isIntNumber($number){
       if (!is_int($number) && !is_string($number)) return false;
       if (!preg_match("/^-?(([1-9][0-9]*|0))$/", $number)) return false;
       return true;
   }
}
