<?php
require_once "../private/autoloader.php";
require_once "../static/database.php";
//require_once "../static/settings.php";

$filename = substr($_SERVER['REDIRECT_URL'], 1);
if ($filename == '') {
    $filename = 'home';
}
if(!isset($_SESSION['user'])){
    $filename = 'login';
}

if (file_exists($filename . '.php')) {
    include($filename . '.php');
} elseif (file_exists($filename . '.html')) {
    include($filename . '.html');
} else {
    include('404.HTML');
}