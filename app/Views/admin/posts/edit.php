
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea'], 'admin'); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?> 
    <?= $form->submit('Sauvegarder', 'is-success'); ?>
</form>