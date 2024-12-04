<h1>Liste des Kebabs</h1>

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
            <th>Prix (Sandwich)</th>
            <th>Prix (Menu)</th>
            <th>Prix (Assiette)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($kebabs)): ?>
            <?php foreach ($kebabs as $index => $kebab): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($kebab['name']); ?></td>
                    <td><?= htmlspecialchars($kebab['description']); ?></td>
                    <td><?= htmlspecialchars($kebab['price_sandwich']); ?> €</td>
                    <td><?= htmlspecialchars($kebab['price_menu']); ?> €</td>
                    <td><?= htmlspecialchars($kebab['price_plate']); ?> €</td>
                    <td>
                        <a href="/kebab/edit/<?= htmlspecialchars($kebab['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/kebab/delete/<?= htmlspecialchars($kebab['id']); ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Supprimer ce kebab ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Aucun kebab trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

