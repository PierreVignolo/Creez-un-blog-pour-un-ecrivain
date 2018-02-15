<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;

$post = Article::find($_GET['id']);
if ($post === false) {
    App::notFound();
}

$categories = Categorie::find($post->category_id);

?>

<h1><?= $post->titre; ?></h1>

<p><em><?= $categories->titre; ?></em></p>

<p><?= $post->contenu; ?></p>