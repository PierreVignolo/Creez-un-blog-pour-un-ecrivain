<?php

namespace App\Controller;

use App;
use Core\Controller\Controller;

class AppController extends Controller
{

    protected $template = 'public';
    
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';

        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}