<?php

define("ROOT", dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 'posts.index';
}


$page = explode('.', $page);
if($page[0] == 'admin')
{
    if (count($page) == 2) {
        $page[2] = $page[1];
        $page[1] = 'admin';
    }
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}

if (!isset($action)) {
           header('HTTP/1.0 404 Not Found');
 header("Location: http://google.fr ");
}

$controller = new $controller();
$controller->$action();


?>








