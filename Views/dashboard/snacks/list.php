<h1>Liste des Snacks</h1>

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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($snacks)): ?>
            <?php foreach ($snacks as $index => $snack): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($snack['name']); ?></td>
                    <td><?= htmlspecialchars($snack['description']); ?></td>
                    <td><?= htmlspecialchars($snack['price']); ?> €</td>
                    <td>
                        <a href="/snack/edit/<?= htmlspecialchars($snack['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/snack/delete/<?= htmlspecialchars($snack['id']); ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Supprimer ce snack ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun snack trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
