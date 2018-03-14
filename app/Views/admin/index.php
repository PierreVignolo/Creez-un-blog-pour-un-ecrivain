<section class="box">
    <h1 class="title is-1">Administrer les articles</h1>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr class="subtitle">
                <th>ID</th>
                <th>Date et Heure</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th class="has-text-centered">Actions</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->date_heure; ?></td>
                <td><?= $post->titre; ?></td>
                <td><?= $post->categorie ?></td>
                <td class='has-text-centered'>
                    <a href="?p=admin.posts.edit&id=<?= $post->id; ?>" class="button is-primary">Editer</a>
                    <a href="?p=posts.single&id=<?= $post->id; ?>" class="button is-link">Voir</a>
                    <form action="?p=admin.posts.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <button type="submit" class="button is-danger" href="?p=admin.posts.delete&id=<?= $post->id; ?>">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

            <a href="?p=admin.posts.add" class="button is-success">Ajouter</a>
    
    </section>

    <section class="box">
        <h1 class="title is-1">Administrer les catégories</h1>

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
                        <a href="?p=posts.category&id=<?= $category->id; ?>" class="button is-link">Voir</a>
                        <form action="?p=admin.categories.delete" method="post" style="display: inline;">
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
</section>