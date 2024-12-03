<h2 class="text-center mb-4">Liste des Offres</h2>

<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['flash_success']; ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Noms</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($offres as $offre): ?>
            <tr>
                <td><?= htmlspecialchars($offre['name']); ?></td>
                <td><?= htmlspecialchars($offre['description']); ?></td>
                <td><?= $offre['price'] ? htmlspecialchars($offre['prix']) . ' €' : 'N/A'; ?></td>
                <td>
                    <a href="/offre/edit/<?= $offre['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/offre/delete/<?= $offre['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette offre ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>