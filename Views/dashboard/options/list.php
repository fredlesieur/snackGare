<h2 class="text-center mb-4">Liste des Options</h2>

<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['flash_success']; ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($options as $option): ?>
            <tr>
                <td><?= htmlspecialchars($option['category']); ?></td>
                <td><?= htmlspecialchars($option['description']); ?></td>
                <td><?= $option['price'] ? htmlspecialchars($option['price']) . ' €' : 'N/A'; ?></td>
                <td>
                    <a href="/option/edit/<?= $option['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/option/delete/<?= $option['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette option ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
