<?php

namespace App\Controller\Admin;

use Core\HTML\BulmaForm;

class PostsController extends AdminController{

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                header('Location: ?p=admin.index');
            }
        }

        $categories = $this->Category->extract('id', 'titre');
        $form = new BulmaForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                header('Location: ?p=admin.index');
            }
        }
        $post = $this->Post->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new BulmaForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            $this->Comment->deleteByArticleId($_POST['id']);
            header('Location: ?p=admin.index');
        }
    }

    public function single()
    {
        $article = $this->Post->findWithCategory($_GET['id']);
        $comment = $this->Comment->lastByComment($_GET['id']);

        \App::getInstance()->title = \App::getInstance()->title . ' - ' . $article->titre;

        if ($article === false) {
            $this->notFound();
        }

        $this->render('admin.posts.single', compact('article', 'comment'));

    }

}