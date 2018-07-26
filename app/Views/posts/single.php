<?= $flash ?>
<section class="section">

    <div class='hero is-danger is-small'>
        <div class="hero-body has-text-centered">

                <h1 class="title is-1"><?= $article->titre; ?></h1>
                <h3 class="subtitle is-3"><em><?= $article->categorie; ?></em></h3>


        </div>
    </div>
    <div class="box subtitle is-5 has-text-justified">
        <p><?= $article->contenu; ?></p>
    </div>

</section>

<section>

    <p class="subtitle is-4">Vos commentaires</p>
    <?php foreach ($comment as $comment): ?>
    <p class="subtitle is-5 zero-bottom has-text-weight-semibold"><?= $comment->pseudo; ?>,</p>
    <p class="is-italic has-text-grey zero-top"><?= $comment->date_heure; ?></p> 
    <p class="subtitle is-5"><?= $comment->contenu; ?></p>
    <div class="field is-grouped is-grouped-right">
        <form method="post" action="?p=comment.signale">
            <input type="hidden" name="id" value="<?= $comment->id ?>">
            <input type="hidden" name="aid" value="<?= $article->id ?>">
            <input type="hidden" name="nb" value="<?= $comment->signale ?>">
            <?= $form->submit('Signaler', 'is-warning has-text-danger is-small'); ?>
        </form>
    </div>
    <?php endforeach; ?>

</section>

<section class="section">
    <form method="post" action="?p=comment.add">
        <p class="subtitle is-4">Laissez votre commentaire</p>
        <?= $form->input('pseudo', 'Pseudo'); ?>
        <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
        <input type="hidden" name="id" value="<?= $article->id ?>">
        <?= $form->submit(); ?>
    </form>
</section>

