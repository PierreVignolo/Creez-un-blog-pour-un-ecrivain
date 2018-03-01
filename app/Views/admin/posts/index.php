<section>
    <h1>Administrer les articles</h1>

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Titre</td>
                <td>Actions</td>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->titre; ?></td>
                <td>
                    <a href="?p=posts.edit&id=<?= $post->id; ?>" class="btn btn-primary">Editer</a>
                    <form action="?p=posts.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <button type="submit" class="btn btn-danger" href="?p=posts.delete&id=<?= $post->id; ?>">Supprimer</button>
                    </form>
                </td>
            </tr>
    <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        <a href="?p=posts.add" class="btn btn-success">Ajouter</a>
    </p>
</section>

<!-- <section>
    <h1>Administrer les Catégories</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>    
    </thead>
    <tbody>
        <?php foreach($categories as $categorie): ?>
        <tr>
            <td><?= $categorie->id; ?></td>
            <td><?= $categorie->titre; ?></td>
            <td>
                <a href="?p=categories.edit&id=<?= $categorie->id; ?>" class="btn btn-primary">Editer</a>
                <form action="?p=categories.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $categorie->id ?>">
                    <button type="submit" class="btn btn-danger" href="?p=categories.delete&id=<?= $categorie->id; ?>">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p>
    <a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>
</section> -->