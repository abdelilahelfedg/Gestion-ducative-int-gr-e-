<?php

session_start();
// include_once "../app/Loader.php";
require "../app/Core/init.php";

// DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new APP;
$app->loadController();


// function sayhe(){
//     echo "wafin a sba3 hhggg";
// }

// call_user_func('sayhe');