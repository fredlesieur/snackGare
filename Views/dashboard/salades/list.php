<h2 class="text-center mb-4">Liste des Salades</h2>

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
        <?php foreach ($salades as $salade): ?>
            <tr>
                <td><?= htmlspecialchars($salade['name']); ?></td>
                <td><?= htmlspecialchars($salade['description']); ?></td>
                <td><?= htmlspecialchars($salade['price']); ?> €</td>
                <td>
                    <a href="/salade/edit/<?= $salade['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="/salade/delete/<?= $salade['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette salade ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
