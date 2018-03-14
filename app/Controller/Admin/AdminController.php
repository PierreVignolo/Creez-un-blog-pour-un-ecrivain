<?php

namespace App\Controller\Admin;

use App;
use Core\Auth\DBAuth;
use App\Controller\AppController;


class AdminController extends AppController
{
    protected $template = 'admin';

    public function __construct() {
        parent::__construct();

        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if (!$auth->logged()) {
            $this->forbidden();   
        }
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    public function index()
    {
        $items = $this->Category->all();
        $posts = $this->Post->last();
        $comments = $this->Comment->all();
        
        $this->render('admin.index', compact('posts', 'items', 'comments'));
    }

}