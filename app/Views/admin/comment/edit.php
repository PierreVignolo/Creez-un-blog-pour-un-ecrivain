<form method="post">
    <?= $form->input('pseudo', 'Pseudo'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->submit('Sauvegarder', 'is-success'); ?>
</form>