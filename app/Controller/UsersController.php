<?php

namespace App\Controller;

use App;
use Core\Auth\DBAuth;
use Core\HTML\BulmaForm;


class UsersController extends AppController
{

    public function login()
    {
        $errors = false;
        if (!empty ($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password']))) {
                header('Location: ?p=admin.index');
            } else {
                $errors = true;
            }
        }
        $form = new BulmaForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

}