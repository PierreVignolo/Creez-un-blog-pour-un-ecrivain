<?= $flash; ?>

<div class="block box">
    <h1 class="title is-1">Administrer les billets</h1>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr class="subtitle">
                <th>ID</th>
                <th>Date et Heure</th>
                <th>Titre</th>
                <th>Chapitre</th>
                <th class="has-text-centered">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->date_heure; ?></td>
                <td><?= $post->titre; ?></td>
                <td><?= $post->categorie; ?></td>
                <td class='has-text-centered'>
                    <a href="?p=admin.posts.edit&id=<?= $post->id; ?>" class="button is-primary">Editer</a>
                    <a href="?p=admin.posts.single&id=<?= $post->id; ?>" class="button is-link">Voir</a>
                    <form action="?p=admin.posts.delete" method="post" class="inline">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <button type="submit" class="button is-danger" href="?p=admin.posts.delete&id=<?= $post->id; ?>">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="?p=admin.posts.add" class="button is-success">Ajouter</a>

</div>

<div class="block box">
    <h1 class="title is-1">Administrer les chapitres</h1>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th class="has-text-centered">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($items as $category): ?>
            <tr>
                <td><?= $category->id; ?></td>
                <td><?= $category->titre; ?></td>
                <td class="has-text-centered">
                    <a class="button is-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?>">Editer</a>
                    <a href="?p=admin.categories.category&id=<?= $category->id; ?>" class="button is-link">Voir</a>
                    <form action="?p=admin.categories.delete" method="post" class="inline">
                        <input type="hidden" name="id" value="<?= $category->id ?>">
                        <button type="submit" class="button is-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        <a href="?p=admin.categories.add" class="button is-success">Ajouter</a>
    </p>
</div>

<div class="box">
    <h1 class="title is-1">Administrer les commentaires</h1>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID Article</th>
                <th>Pseudo</th>
                <th>Contenu</th>
                <th>Signalement</th>
                <th class="has-text-centered">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comments as $comment): ?>
            <tr>
                <td><?= $comment->article_id; ?></td>
                <td><?= $comment->pseudo; ?></td>
                <td><?= $comment->contenu; ?></td>
                <?php if ($comment->signale == 0) : ?>
                    <td class="has-text-success"><?= $comment->signale; ?></td>
                <?php else : ?>
                    <td class="has-text-danger">
                        <?= $comment->signale; ?> &nbsp; &nbsp;
                        <form action="?p=admin.comment.reset" method="post" class="inline">
                            <input type="hidden" name="id" value="<?= $comment->id ?>">
                            <button class="button is-small" type="submit">Reset</button>
                        </form>
                    </td>
                <?php endif; ?>



                <td class="has-text-centered">
                    <a class="button is-primary" href="?p=admin.comment.edit&id=<?= $comment->id; ?>">Editer</a>
                    <form action="?p=admin.comment.delete" method="post" class="inline">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button type="submit" class="button is-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
