<h1>Liste des Burgers</h1>

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
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Prix Menu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($burgers)): ?>
            <?php foreach ($burgers as $index => $burger): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($burger['name']); ?></td>
                    <td><?= htmlspecialchars($burger['description']); ?></td>
                    <td><?= htmlspecialchars($burger['price']); ?> €</td>
                    <td><?= htmlspecialchars($burger['price_menu']); ?> €</td>
                    <td>
                        <a href="/burger/edit/<?= htmlspecialchars($burger['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/burger/delete/<?= htmlspecialchars($burger['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce burger ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Aucun burger trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

