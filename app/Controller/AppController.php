<?php

namespace App\Controller;

use App;
use Core\Controller\Controller;

class AppController extends Controller
{

    protected $template = 'public';
    
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

}