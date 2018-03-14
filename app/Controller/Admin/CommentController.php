<?php

namespace App\Controller\Admin;

use Core\HTML\BulmaForm;

class CommentController extends AdminController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Comment');
        $this->loadModel('Post');
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Comment->update($_GET['id'], [
                'pseudo' => $_POST['pseudo'],
                'contenu' => $_POST['contenu']
            ]);
            if($result){
                return $this->index();
            }
        }
        $comment = $this->Comment->find($_GET['id']);
        $form = new BulmaForm($comment);
        $this->render('admin.comment.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

}