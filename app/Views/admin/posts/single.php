
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
    <?php endforeach; ?>

</section>

