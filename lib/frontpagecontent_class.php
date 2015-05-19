<?php
require_once 'modules_class.php';

class FrontPageContent extends Modules{
    
    private $articles;
    private $page;
    
    public function __construct($db) {
        parent::__construct($db);
        $this->articles = $this->article->getAllSortDate();
        $this->page = (isset($this->data['page'])) ? $this->data['page'] : 1;
    }
}
