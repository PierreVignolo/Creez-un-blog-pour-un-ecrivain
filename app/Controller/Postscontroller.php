<?php

namespace App\Controller;

use App;
use Core\Controller\Controller;

class Postscontroller extends AppController
{
    
    public function index()
    {
        $posts = App::getInstance()->getTable('Post')->last();
        $categories = App::getInstance()->getTable('Category')->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category()
    {
        # code...
    }

    public function single()
    {
        # code...
    }

}