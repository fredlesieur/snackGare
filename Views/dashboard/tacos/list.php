<h2 class="text-center mb-4">Liste des Tacos</h2>

<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['flash_success']; ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['flash_error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['flash_error']; ?>
        <?php unset($_SESSION['flash_error']); ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix (Solo)</th>
            <th>Prix (Menu)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tacos as $taco): ?>
            <tr>
                <td><?= htmlspecialchars($taco['name']); ?></td>
                <td><?= htmlspecialchars($taco['description']); ?></td>
                <td><?= htmlspecialchars($taco['price_solo']); ?> €</td>
                <td><?= htmlspecialchars($taco['price_menu']); ?> €</td>
                <td>
                    <a href="/tacos/edit/<?= $taco['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/tacos/delete/<?= $taco['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette formule ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

