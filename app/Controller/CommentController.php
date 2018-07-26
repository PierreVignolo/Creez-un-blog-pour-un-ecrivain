<?php

namespace App\Controller;

class CommentController extends AppController{

    public function add(){
        if (!empty($_POST['pseudo']) && !empty($_POST['contenu']) && !empty($_POST['id'])) {
            $result = $this->Comment->create([
                'pseudo' => $_POST['pseudo'],
                'contenu' => $_POST['contenu'],
                'article_id' => $_POST['id']
            ]);
            $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Le commentaire a bien été rajouté</p>';
        }
        else {
            $_SESSION['flash'] = '<p class="notification is-warning"><button class="delete" onclick="supprimer()"></button>Veuillez remplir tous les champs</p>';
        }
        header('location: ?p=posts.single&id='. $_POST['id'] );
    }

    public function signale(){

        if ($_POST['nb'] === null){
            $this->Comment->update($_POST['id'], [
                'signale' => 1
            ]);
        }else{
            $this->Comment->update($_POST['id'], [
                'signale' => $_POST['nb'] + 1
            ]);
        }
        $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Votre signalement a bien été envoyé</p>';
        header('location: ?p=posts.single&id='. $_POST['aid'] );
    }
}