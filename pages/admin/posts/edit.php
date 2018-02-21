<?php
$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)) {
    $result = $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
    ]);

    if ($result) {
        ?>
        <div class="alert alert-success">l'article a bien été ajouté</div>
        <?php
    }
}
$post = $postTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?> 
    <button class="btn btn-primary">Sauvegarder</button>
</form>