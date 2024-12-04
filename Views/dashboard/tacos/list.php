<h1>Liste des Tacos</h1>

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
            <th>Prix (Solo)</th>
            <th>Prix (Menu)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($tacos)): ?>
            <?php foreach ($tacos as $index => $taco): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($taco['name']); ?></td>
                    <td><?= htmlspecialchars($taco['description']); ?></td>
                    <td><?= htmlspecialchars($taco['price_solo']); ?> €</td>
                    <td><?= htmlspecialchars($taco['price_menu']); ?> €</td>
                    <td>
                        <a href="/tacos/edit/<?= htmlspecialchars($taco['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/tacos/delete/<?= htmlspecialchars($taco['id']); ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Supprimer cette formule ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Aucun taco trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
