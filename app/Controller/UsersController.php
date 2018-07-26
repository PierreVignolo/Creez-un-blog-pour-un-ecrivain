<?php

namespace App\Controller;

use App;
use Core\Auth\DBAuth;
use Core\HTML\BulmaForm;


class UsersController extends AppController
{

    public function login()
    {
        \App::getInstance()->title = \App::getInstance()->title . ' - Login';

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

    public function logout() {
        $_SESSION["auth"] = NULL;
        session_destroy();
        session_start();
        $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Vous êtes bien déconnecté</p>';
        header("location: ?p=posts.index");



    }

}