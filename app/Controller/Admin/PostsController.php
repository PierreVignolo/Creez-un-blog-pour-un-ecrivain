<?php

namespace App\Controller\Admin;

use Core\HTML\BulmaForm;


class PostsController extends AdminController
{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index()
    {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add()
    {
        
        if (!empty($_POST)) {
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);

            if ($result) {
                return $this->index();
            }
        }
        $categories = $this->Category->extract('id', 'titre');
        $form = new BulmaForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function edit()
    {
        
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);

            if ($result) {
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new BulmaForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));


    }    

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }
}