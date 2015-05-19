<?php
mb_internal_encoding("UTF-8");//установка внутренной кодировкии 
function __autoload(){
    require_once __DIR__.'/lib/'.__FILE__.'_class.php';
}
$db = new DataBase();
$view = $_GET["view"];

switch ($view){
    case "": {
        $content = new FrontPageContent($db);
        break;
            }
    default: exit;
}

echo $content->getContent();
