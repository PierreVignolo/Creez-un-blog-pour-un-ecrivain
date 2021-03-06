<?php

namespace App\Controller\Admin;

use Core\HTML\BulmaForm;

class CommentController extends AdminController{

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Comment->update($_GET['id'], [
                'pseudo' => $_POST['pseudo'],
                'contenu' => $_POST['contenu'],
            ]);
            if($result){
                header('Location: ?p=admin.index');
                $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Votre commentaire a bien été édité</p>';
            }
        }
        $comment = $this->Comment->find($_GET['id']);
        $form = new BulmaForm($comment);
        $this->render('admin.comment.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);

            if ($result){
                header('Location: ?p=admin.index');
                $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Votre commentaire a bien été supprimé</p>';
            }
        }
    }

    public function reset(){
        if (!empty($_POST)){
            $result = $this->Comment->update($_POST['id'], [
                'signale' => 0
            ]);
            if ($result){
                header('location: ?p=admin.index');
                $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Le compteur des signalements a bien été mis à zero</p>';
            }
        }
    }

}