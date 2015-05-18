<?php
require_once 'global_class.php';

class User extends GlobalClass{
    
    public function __construct( $db) {
        parent::__construct("users", $db);
    }
    
}
