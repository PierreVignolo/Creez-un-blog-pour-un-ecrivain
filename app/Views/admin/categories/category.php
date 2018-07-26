<h1 class="title is-1"><?= $categorie->titre ?></h1>


<div class="columns">
    <div class="column">
        <div class="box">

            <h2 class="title is-3">Liste des articles</h2>
            <?php foreach ($articles as $article): ?>
                <ul>
                        <li><a href="?p=admin.posts.single&id=<?= $article->id; ?>"><?= $article->titre; ?></a></li>
                </ul>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="column">

        <ul>
        <?php foreach ($categories as $categorie): ?>

            <li><a href="?p=admin.categories.category&id=<?= $categorie->id; ?>"><?= $categorie->titre; ?></a></li>

        <?php endforeach ?>
        </ul>

    </div>

</div>




