<?php
mb_internal_encoding("UTF-8");//установка внутренной кодировкии 
require_once '/lib/config_class.php';
require_once '/lib/database_class.php';
require_once '/lib/modules_class.php';
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
