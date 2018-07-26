<?php

namespace App\Controller\Admin;

use Core\HTML\BulmaForm;

class CommentController extends AdminController{

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Comment->update($_GET['id'], [
                'pseudo' => $_POST['pseudo'],
                'contenu' => $_POST['contenu'],
                'signale' => $_POST['signale']
            ]);
            if($result){
                header('Location: ?p=admin.index');
            }
        }
        $comment = $this->Comment->find($_GET['id']);
        $form = new BulmaForm($comment);
        $this->render('admin.comment.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            header('Location: ?p=admin.index');
        }
    }

    public function reset(){
        if (!empty($_POST)){
            $this->Comment->update($_POST['id'], [
                'signale' => 0
            ]);
        }
        header('location: ?p=admin.index');
    }

}