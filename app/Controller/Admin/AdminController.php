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
    }

    public function index()
    {
        \App::getInstance()->title = \App::getInstance()->title . ' - Admin';

        $items = $this->Category->all();
        $posts = $this->Post->last();
        $comments = $this->Comment->all();

        $flash = false;
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
        
        $this->render('admin.index', compact('posts', 'items', 'comments', 'flash'));
    }

}