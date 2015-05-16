<!DOCTYPE html>

<html lang="ru-RU">
    <head>
        <title>%title%</title>
        <meta charset="UTF-8">
        <meta name="description" content="%meta_desc%">
        <meta name="keywords" content="%meta_key%">
        <link rel="stylesheet" href="%address%css/main.css" type="text/css">
        
    </head>
    <body>
        <div id="content">
            <div id="header">
                Header
            </div>
          
            <div id="main_content">
                <div id="left">
                    <h2>Меню</h2>
                    <ul>%menu%</u>
                    %auth_user%
                    
                </div>
                <div id="right">
                    <form name="search" action="%address%" method="get">
                        <p>
                            Поиск: <input type="text" name="words">
                        </p>
                        <p>
                            <input type="hidden" name="view" value="search">
                            <input type="submit" name="search" value="Искать">
                        </p>
                    </form>
                    <h2>Реклама</h2>
                    %banners%
                </div>
                <div id="center">
                    %top%
                    %middle%
                    %bottom%
                </div><!--здесь заканчевается div #center-->
                  %pagination%
            </div><!--здесь заканчевается div #main_content-->
            <div id="footer">
                <p> Все права защищены © 2015 </p>
            </div>
        </div>
    </body>
</html>
