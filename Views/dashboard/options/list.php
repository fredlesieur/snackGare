<h1>Liste des Options</h1>

<!-- Messages de succès ou d'erreur -->
<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['flash_success']); ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['flash_error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['flash_error']); ?>
        <?php unset($_SESSION['flash_error']); ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($options)): ?>
            <?php foreach ($options as $index => $option): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($option['category']); ?></td>
                    <td><?= htmlspecialchars($option['description']); ?></td>
                    <td><?= $option['price'] ? htmlspecialchars($option['price']) . ' €' : 'N/A'; ?></td>
                    <td>
                        <a href="/option/edit/<?= htmlspecialchars($option['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/option/delete/<?= htmlspecialchars($option['id']); ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Supprimer cette option ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucune option trouvée.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

