<?php
function __autoload(){
    require_once __DIR__ . '_class.php';
    
}

abstract class Modules{
    
    protected $config;
    protected $article;
    protected $section;
    protected $user;
    protected $menu;
    protected $banner;
    protected $message;
    protected $data;
    
    public function __construct($db) {
        session_start();
        $this->config = new Config();
        $this->article = new Article($db);
        $this->section = new Section($db);
        $this->banner = new Banner($db);
        $this->user = new User($db);
        $this->menu = new Menu($db);
        $this->message = new Message();
        $this->data = $this->secureData($_GET);
    }
    
    private function secureData($data){
        foreach ($data as $key => $value){
            if (is_array($value)) $this->secureData ($value);
                else {
                    $date[$key] = htmlspecialchars($value);
                }
        }
        return $data;
    }
    
    protected function getTemplate($name){
        $text = file_get_contents($this->config->dir_tmpl.$name.".tpl");
        return str_replace("%address%", $this->config->address, $text);
    }
    
    protected function getReplaceTemplate($sr, $template){
        return $this->getReplaceContent($sr, $this->getTemplate($template));
    }
    
    private function getReplaceContent($sr, $content){
        $search = array();
        $replace = array();
        $i = 0;
        foreach ($sr as $key => $value){
            $search[$i] = $key;
            $replace[$i] = $value;
            $i++;
        }
        return str_replace($search, $replace, $content);
    }
    
    
}
