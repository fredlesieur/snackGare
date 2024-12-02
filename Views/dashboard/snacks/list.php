<h2 class="text-center mb-4">Liste des Snacks</h2>

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
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($snacks as $snack): ?>
            <tr>
                <td><?= htmlspecialchars($snack['name']); ?></td>
                <td><?= htmlspecialchars($snack['description']); ?></td>
                <td><?= htmlspecialchars($snack['price']); ?> €</td>
                <td>
                    <a href="/snack/edit/<?= $snack['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/snack/delete/<?= $snack['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce snack ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
