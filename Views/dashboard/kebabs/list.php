<h2 class="text-center mb-4">Liste des Kebabs</h2>

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
            <th>Prix (Sandwich)</th>
            <th>Prix (Menu)</th>
            <th>Prix (Assiette)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kebabs as $kebab): ?>
            <tr>
                <td><?= htmlspecialchars($kebab['name']); ?></td>
                <td><?= htmlspecialchars($kebab['description']); ?></td>
                <td><?= htmlspecialchars($kebab['price_sandwich']); ?> €</td>
                <td><?= htmlspecialchars($kebab['price_menu']); ?> €</td>
                <td><?= htmlspecialchars($kebab['price_plate']); ?> €</td>
                <td>
                    <a href="/kebab/edit/<?= $kebab['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/kebab/delete/<?= $kebab['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce kebab ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
