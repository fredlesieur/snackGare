<h2 class="text-center mb-4">Liste des Boissons</h2>

<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['flash_success']; ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix (Bouteille)</th>
            <th>Prix (Canette)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($boissons as $boisson): ?>
            <tr>
                <td><?= htmlspecialchars($boisson['name']); ?></td>
                <td><?= htmlspecialchars($boisson['description']); ?></td>
                <td><?= $boisson['price_bottle'] !== null ? htmlspecialchars($boisson['price_bottle']) . ' €' : 'N/A'; ?></td>
                <td><?= $boisson['price_can'] !== null ? htmlspecialchars($boisson['price_can']) . ' €' : 'N/A'; ?></td>
                <td>
                    <a href="/boisson/edit/<?= $boisson['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/boisson/delete/<?= $boisson['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette boisson ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
