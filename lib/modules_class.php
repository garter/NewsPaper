<?php
require_once __DIR__.'config_class.php';
require_once __DIR__.'article_class';
require_once __DIR__.'section_class';
require_once __DIR__.'user_class';
require_once __DIR__.'menu_class';
require_once __DIR__.'banner_class';
require_once __DIR__.'message_class';

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
    
    public function getContent(){
        $sr["title"] = $this->getTitle();
        $sr["meta_desc"] = $this->getDescription();
        $sr["meta_key"] = $this->getKeyWords();
        $sr["menu"] = $this->getMenu();
        $sr["auth_user"] = $this->getAuthUser();
        $sr["banners"] = $this->getBanners();
        $sr["top"] = $this->getTop();
        $sr["middle"] = $this->getMiddle();
        $sr["bottom"] = $this->getBottom();
        return $this->getReplaceTemplate($sr, "main");
    }
    
    abstract protected function getTitle();
    abstract protected function getDescription();
    abstract protected function getKeyWords();
    abstract protected function getMiddle();
    
    /*protected function getMenu(){
        $menu = $this->menu->getAll();
        for ($i = 0; $i < count($menu); $i++){
            $sr["title"] = menu[$i]["title"];
            $sr["link"] = menu[$i]["link"];
            $text .= $this->getReplaceTemplate($sr, "menu_item");
        }
        return $text;
    }*/
    
    protected function getAuthUser(){
        $sr["message_auth"] = "";
        return $this->getReplaceTemplate($sr, "form_auth");
    }
    
    protected function getBanners(){
        $banners = $this->banner->getAll();
        for ($i = 0; $i < count($banners); $i++){
            $sr["code"] = $banners[$i]["code"];
            $text .= $this->getReplaceTemplate($sr, "banner");
        }
        return $text;
    }

    protected function getTop(){
        return "";
    }
    
    protected function getBottom(){
        return "";
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
            $search[$i] = "%$key%";
            $replace[$i] = $value;
            $i++;
        }
        return str_replace($search, $replace, $content);
    }
    
    
}
