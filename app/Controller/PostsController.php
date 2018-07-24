<?php

namespace App\Controller;

use Core\HTML\BulmaForm;

class PostsController extends AppController
{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }
    
    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $flash = false;
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
        $this->render('posts.index', compact('posts', 'categories', 'flash'));
    }

    public function category()
    {

        $categorie = $this->Category->find($_GET['id']) ;
        \App::getInstance()->title = \App::getInstance()->title . ' - ' . $categorie->titre;

        if ($categorie === false) {
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();

        $this->render('posts.category', compact('categorie', 'articles', 'categories'));
    }

    public function single()
    {
        $article = $this->Post->findWithCategory($_GET['id']);
        $comment = $this->Comment->lastByComment($_GET['id']);

        \App::getInstance()->title = \App::getInstance()->title . ' - ' . $article->titre;


        if ($article === false) {
            $this->notFound();
        }

        $form = new BulmaForm();
        $flash = false;
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }    
        $this->render('posts.single', compact('form', 'article', 'comment', 'flash'));

    }



}