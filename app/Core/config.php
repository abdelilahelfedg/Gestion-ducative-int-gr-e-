<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DBNAME', 'utili');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('ROOT', 'http://localhost/Gestion_Educative_Integree/public');
}
else{
    define('ROOT', 'https://www.yourwebsite.com'); // when you put your website in online service
}

/** true means show errors */
define("DEBUG", true);