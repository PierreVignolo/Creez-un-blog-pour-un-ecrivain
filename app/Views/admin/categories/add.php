<?php
$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
    $result = $categoryTable->create([
        'titre' => $_POST['titre']
    ]);

    if ($result) {
        header('location: admin.php');
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de la categorie'); ?> 
    <button class="btn btn-primary">Ajouter</button>
</form>