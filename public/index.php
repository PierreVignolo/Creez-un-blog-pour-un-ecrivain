<?php

define("ROOT", dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 'home';
}


if ($page === 'home') {
    $controller = new \App\Controller\Postscontroller();
    $controller->index();
}
elseif ($page === 'posts.category') {
    $controller = new \App\Controller\Postscontroller();
    $controller->category();
}
elseif ($page === 'posts.single') {
    $controller = new \App\Controller\Postscontroller();
    $controller->single();
}
elseif ($page === 'login') {
    $controller = new \App\Controller\Userscontroller();
    $controller->login();
}

?>








