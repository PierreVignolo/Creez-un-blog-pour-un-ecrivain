<?php if($errors): ?>
    <div class="notification is-danger">
        Identifiants Incorrects
    </div>
<?php endif ?>

<form method="post">
    <?= $form->input('username', 'Pseudo') ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?> 
    <?= $form->submit('Login'); ?>
</form>
