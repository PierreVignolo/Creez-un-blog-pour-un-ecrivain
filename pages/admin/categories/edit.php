<?php
$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
    $result = $categoryTable->update($_GET['id'], [
        'titre' => $_POST['titre']
    ]);

    if ($result) {
        ?>
        <div class="alert alert-success">la Catégorie a bien été modifiée</div>
        <?php
    }
}
$categorie = $categoryTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');
$form = new \Core\HTML\BootstrapForm($categorie);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de la Catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>