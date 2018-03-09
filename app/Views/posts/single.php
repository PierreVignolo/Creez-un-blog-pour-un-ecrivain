<section class="section">
    <h1 class="title is-1"><?= $article->titre; ?></h1>

    <p class="subtitle is-3"><em><?= $article->categorie; ?></em></p>

    <p class="subtitle is-5"><?= $article->contenu; ?></p>
</section>

<section class="section">
    <form>
        <p class="subtitle is-5">Laissez votre commentaire</p>
        <?= $form->input('pseudo', 'Pseudo'); ?>
        <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
        <?= $form->submit(); ?>
    </form>
</section>

