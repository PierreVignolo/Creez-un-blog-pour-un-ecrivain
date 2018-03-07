<div class="columns">
    
        <div class="column">

            <?php foreach ($posts as $post): ?>

            <div class="box">        
            
                <h2 class="title is-2 article-title"><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>

                <p class="subtitle is-3"><em><?= $post->categorie ?></em></p>

                <p class="subtitle is-5"><?= $post->extrait; ?></p>

            </div>
            
            <?php endforeach; ?>

        </div>


    <div class="column">

        <ul>
        <?php foreach ($categories as $categorie): ?>

            <li class="subtitle"><a href="<?= $categorie->url ?>"><?= $categorie->titre; ?></a></li>

        <?php endforeach ?>
        </ul>

    </div>

</div>




