<?php

namespace App\Controller\Admin;

use Core\HTML\BulmaForm;

class CategoriesController extends AdminController{

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
            ]);
            if ($result){
                header('Location: ?p=admin.index');
                $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Votre catégorie a bien été ajouté</p>';
            };
        }
        $form = new BulmaForm($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            if ($result){
                header('Location: ?p=admin.index');
                $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Votre catégorie a bien été édité</p>';
            }
        }
        $category = $this->Category->find($_GET['id']);
        $form = new BulmaForm($category);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            if ($result){
                header('Location: ?p=admin.index');
                $_SESSION['flash'] = '<p class="notification is-success"><button class="delete" onclick="supprimer()"></button>Votre catégorie a bien été supprimé</p>';
            }
        }
    }

    public function category()
    {

        $categorie = $this->Category->find($_GET['id']) ;
        \App::getInstance()->title = \App::getInstance()->title . ' - ' . $categorie->titre;

        if ($categorie === false) {
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();

        $this->render('admin.categories.category', compact('categorie', 'articles', 'categories'));
    }

}