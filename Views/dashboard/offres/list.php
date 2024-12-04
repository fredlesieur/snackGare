<h1 class="text-center mb-4">Liste des Offres</h1>

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
            <th>Noms</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($offres) && is_array($offres)): ?>
            <?php foreach ($offres as $offre): ?>
                <tr>
                    <td><?= isset($offre['name']) ? htmlspecialchars($offre['name']) : 'N/A'; ?></td>
                    <td><?= isset($offre['description']) ? htmlspecialchars($offre['description']) : 'N/A'; ?></td>
                    <td><?= isset($offre['tarif']) ? htmlspecialchars($offre['tarif']) : 'N/A'; ?></td>
                    <td>
                        <a href="/offre/edit/<?= isset($offre['_id']) ? $offre['_id'] : ''; ?>" 
                           class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/offre/delete/<?= isset($offre['_id']) ? $offre['_id'] : ''; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Supprimer cette offre ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Aucune offre disponible</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
