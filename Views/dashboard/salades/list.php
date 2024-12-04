<h1>Liste des Salades</h1>

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
        <?php if (!empty($salades)): ?>
            <?php foreach ($salades as $index => $salade): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($salade['name']); ?></td>
                    <td><?= htmlspecialchars($salade['description']); ?></td>
                    <td><?= htmlspecialchars($salade['price']); ?> €</td>
                    <td>
                        <a href="/salade/edit/<?= htmlspecialchars($salade['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/salade/delete/<?= htmlspecialchars($salade['id']); ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Supprimer cette salade ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucune salade trouvée.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
