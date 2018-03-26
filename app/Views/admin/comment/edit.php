<form method="post">
    <?= $form->input('pseudo', 'Pseudo'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->input('signale', '0 = Pas de signalement'); ?>
    <?= $form->submit('Sauvegarder', 'is-success'); ?>
</form>