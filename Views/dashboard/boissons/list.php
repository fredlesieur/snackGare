<h1>Liste des Boissons</h1>

<!-- Messages de succès -->
<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['flash_success']); ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<!-- Tableau des boissons -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix (Bouteille)</th>
            <th>Prix (Canette)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($boissons)): ?>
            <?php foreach ($boissons as $index => $boisson): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($boisson['name']); ?></td>
                    <td><?= htmlspecialchars($boisson['description']); ?></td>
                    <td><?= $boisson['price_bottle'] !== null ? htmlspecialchars($boisson['price_bottle']) . ' €' : 'N/A'; ?></td>
                    <td><?= $boisson['price_can'] !== null ? htmlspecialchars($boisson['price_can']) . ' €' : 'N/A'; ?></td>
                    <td>
                        <a href="/boisson/edit/<?= htmlspecialchars($boisson['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/boisson/delete/<?= htmlspecialchars($boisson['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette boisson ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Aucune boisson trouvée.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
