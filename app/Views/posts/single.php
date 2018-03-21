
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
    <?= $flash ?>

    <p class="subtitle is-5">Vos commentaires</p>
    <?php foreach ($comment as $comment): ?>
    <p class="subtitle is-5"><strong>[<?= $comment->date_heure; ?>]</strong> <?= $comment->pseudo; ?> : <?= $comment->contenu; ?></p>
    <?php endforeach; ?>

</section>

<section class="section">
    <form method="post" action="?p=comment.add">
        <p class="subtitle is-5">Laissez votre commentaire</p>
        <?= $form->input('pseudo', 'Pseudo'); ?>
        <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
        <input type="hidden" name="id" value="<?= $article->id ?>">
        <?= $form->submit(); ?>
    </form>
</section>

