<?= $flash ?>

<div class="block has-text-centered">
    <h1 class="title is-1">
        Bienvenue sur le blog <br>
        'Billet simple pour l'Alaska'
    </h1>
    <p class="subtitle is-2"><em>de Jean Forteroche</em></p>
</div>

<div class="columns block">
        <div class="column is-three-quarters">

            <h4 class="title is-4">Les différents billets</h4>

            <?php foreach ($posts as $post): ?>

            <div class="box">

                <p><?= $post->date_heure; ?></p>        
            
                <h2 class="title is-2 article-title"><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>

                <p class="subtitle is-3"><em><?= $post->categorie ?></em></p>
                
                <div class="subtitle is-5">
                    <?= $post->extrait; ?>
                </div>

            </div>
            
            <?php endforeach; ?>

        </div>


    <div class="column has-text-right">

        <h4 class="title is-4">Les Chapitres</h4>

        <ul>
        <?php foreach ($categories as $categorie): ?>

            <li><a href="<?= $categorie->url ?>"><?= $categorie->titre; ?></a></li>

        <?php endforeach ?>
        </ul>

    </div>

</div>




