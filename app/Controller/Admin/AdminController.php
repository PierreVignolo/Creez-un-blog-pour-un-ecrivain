<?php

namespace App\Controller\Admin;

use App;
use Core\Auth\DBAuth;
use App\Controller\AppController;


class AdminController extends AppController
{

    public function __construct() {
        parent::__construct();

        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if (!$auth->logged()) {
            $this->forbidden();   
        }
    }

}