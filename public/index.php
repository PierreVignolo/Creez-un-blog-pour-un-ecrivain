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

<script src="../public/js/bulma.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
    selector: 'textarea',
    height: 500,
        menubar: false,
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ],
    style_formats: [
        { title: 'Titre et Sous-titre', items: [
        { title: 'Titre 1', block: 'h1', classes: 'title is-1' },
        { title: 'Titre 2', block: 'h2', classes: 'title is-2' },
        { title: 'Titre 3', block: 'h3', classes: 'title is-3' },
        { title: 'Titre 4', block: 'h4', classes: 'title is-4' },
        { title: 'Titre 5', block: 'h5', classes: 'title is-5' },
        { title: 'Titre 6', block: 'h6', classes: 'title is-6' },
        { title: 'Sous-titre 1', block: 'h1', classes: 'title is-1' },
        { title: 'Sous-titre 2', block: 'h2', classes: 'title is-2' },
        { title: 'Sous-titre 3', block: 'h3', classes: 'title is-3' },
        { title: 'Sous-titre 4', block: 'h4', classes: 'title is-4' },
        { title: 'Sous-titre 5', block: 'h5', classes: 'title is-5' },
        { title: 'Sous-titre 6', block: 'h6', classes: 'title is-6' },
        ] },

        { title: 'Blocks', items: [
        { title: 'p', block: 'p' },
        { title: 'div', block: 'div' },
        { title: 'pre', block: 'pre' }
        ] },

        { title: 'Containers', items: [
        { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
        { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
        { title: 'blockquote', block: 'blockquote', wrapper: true },
        { title: 'hgroup', block: 'hgroup', wrapper: true },
        { title: 'aside', block: 'aside', wrapper: true },
        { title: 'figure', block: 'figure', wrapper: true }
        ] }
    ],
    visualblocks_default_state: false,
    end_container_on_empty_block: true
    });
</script>








