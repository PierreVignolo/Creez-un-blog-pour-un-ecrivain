<?php

namespace App\Controller;

use Core\HTML\BulmaForm;

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

}