<h1>Liste des éléments de la page d'accueil</h1>

<!-- Messages de succès ou d'erreur -->
<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']); ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Ordre</th>
            <th>Images</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($elements)): ?>
            <?php foreach ($elements as $element): ?>
                <tr>
                    <td><?= $element['id'] ?></td>
                    <td><?= htmlspecialchars($element['title']) ?></td>
                    <td><?= htmlspecialchars($element['content']) ?></td>
                    <td><?= $element['display_order'] ?></td>
                    <td>
                        <div class="images-list">
                            <?php if (!empty($element['image_urls'])): ?>
                                <?php
                                $imageUrls = explode(',', $element['image_urls']);
                                $imageAlts = explode(',', $element['image_alt_texts']);
                                foreach ($imageUrls as $index => $url):
                                ?>
                                    <img src="<?= htmlspecialchars($url); ?>"
                                        alt="<?= htmlspecialchars($imageAlts[$index] ?? ''); ?>"
                                        class="image-thumbnail">
                                <?php endforeach; ?>
                            <?php else: ?>
                                <em>Aucune image</em>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <a href="/accueil/edit/<?= $element['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/accueil/delete/<?= $element['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Aucun élément trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
